<?php

namespace agilov\docdocsdk\support;

use agilov\docdocsdk\base\Obj;
use Exception;

/**
 * Class Transport
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Transport extends Obj
{
    /** @var string Username */
    public $username;

    /** @var string Password */
    public $password;

    /** @var string Host */
    public $host = 'back.docdoc.ru';

    /** @var string Current API version */
    public $version = '1.0.6';

    /** @var string Debug directory path (Make sure it is writable) */
    public $debug;

    /** @var Transport */
    protected static $instance;

    /**
     * Request constructor.
     * @param array $config
     * @throws Exception
     */
    public function __construct($config = [])
    {
        if (empty($config['username']) || empty($config['password'])) {
            throw new Exception('Username and password is required!');
        }

        parent::__construct($config);
    }

    /**
     * @param $config
     * @throws Exception
     */
    public static function setInstance($config)
    {
        static::$instance = new Transport($config);
    }

    /**
     * @return Transport
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * @param $action
     * @param string $params
     * @return mixed
     * @throws Exception
     */
    public function request($action, $params = '')
    {
        $url = "https://{$this->username}:{$this->password}@{$this->host}/api/rest/{$this->version}/json/{$action}/{$params}";
        $reqId = str_replace('/', '_', "{$action}/{$params}") . '_' . time();
        $result = $this->doRequest($url, $reqId);



        return $result;
    }

    protected $errors = 0;


    /**
     * @param $url
     * @param $reqId
     * @return mixed
     * @throws Exception
     */
    protected function doRequest($url, $reqId)
    {
        sleep(0.2);


        $start = time();
        $debugger = new RequestDebugger(['dir' => $this->debug]);

        $debugger->dumpRequest($reqId, 'URL: ' . $url);
        $debugger->dumpRequest($reqId, 'Start: ' . date('Y-m-d H:i:s', $start));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $raw = curl_exec($ch);
        curl_close($ch);

        $end = time();
        $debugger->dumpRequest($reqId, 'End: ' . date('Y-m-d H:i:s', $end));
        $debugger->dumpRequest($reqId, 'Time (seconds): ' . ($end - $start));
        $debugger->saveResponse($reqId, $raw);

        $result = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            if ($this->errors < 10) {
                $this->errors++;
                $result = $this->doRequest($url, $reqId);
            } else {
                throw new Exception('Invalid server response: (more than 10 times) ' . strip_tags($raw));
            }
        }

        if (!empty($result['status']) && $result['status'] == 'error') {
            $message = !empty($result['message']) ? $result['message'] : $raw;

            throw new Exception('Error: ' . $message);
        }

        return $result;
    }

    /**
     * @param $action
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function post($action, $data = [])
    {
        $debugger = new RequestDebugger(['dir' => $this->debug]);

        $url = "https://{$this->username}:{$this->password}@{$this->host}/api/rest/{$this->version}/json/{$action}";
        $query = json_encode($data);

        $start = time();
        $reqId = str_replace('/', '_', "{$action}") . '_' . time();
        $debugger->dumpRequest($reqId, 'URL: ' . $url);
        $debugger->dumpRequest($reqId, 'POST: ' . $query);
        $debugger->dumpRequest($reqId, 'Start: ' . date('Y-m-d H:i:s', $start));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $raw = curl_exec($ch);
        curl_close($ch);

        $end = time();
        $debugger->dumpRequest($reqId, 'End: ' . date('Y-m-d H:i:s', $end));
        $debugger->dumpRequest($reqId, 'Time (seconds): ' . ($end - $start));
        $debugger->saveResponse($reqId, $raw);

        $result = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid server response: ' . strip_tags($raw));
        }

        return $result;
    }
}
