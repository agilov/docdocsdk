<?php

namespace agilov\docdocsdk\base;

use agilov\docdocsdk\support\Transport;

/**
 * Class Request
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
abstract class Request extends Model
{
    /**
     * Getting request data
     *
     * @return array
     */
    abstract public function getData();

    /**
     * Request action string
     *
     * @return string
     */
    abstract protected function action();

    /**
     * Required params
     *
     * @return array
     */
    public function required()
    {
        return [];
    }

    /**
     * Default values
     *
     * @return array
     */
    public function defaults()
    {
        return [];
    }

    /**
     * Checking required attributes
     *
     * @throws \Exception
     */
    public function checkRequired()
    {
        foreach ($this->required() as $attribute) {
            if (empty($this->getAttribute($attribute))) {
                throw new \Exception($attribute . ' is required');
            }
        }
    }

    /**
     * Setting default attributes
     */
    public function loadDefaults()
    {
        foreach ($this->defaults() as $attribute => $default) {
            if (empty($this->getAttribute($attribute))) {
                $this->{$attribute} = $default;
            }
        }
    }

    /**
     * REST request string separated with slashes
     *
     * @return string
     */
    public function buildRequest()
    {
        $parts = [];

        foreach ($this->attributes() as $attr) {

            $val = $this->getAttribute($attr);

            if (!empty($val)) {
                $val = is_array($val) ? implode(',', $val) : $val;
                $parts[] = $attr . '/' . $val;
            }
        }

        return implode('/', $parts);
    }

    /**
     * Loading data using transport from Transport::getInstance()
     *
     * To change transport credentials use: Transport::setInstance(['username' => 'user', 'password' => 'pass'])
     *
     * @return array
     */
    protected function loadData()
    {
        $transport = Transport::getInstance();

        return $transport->request($this->action(), $this->buildRequest());
    }

    /**
     * Posting data to server
     *
     * @param array $data
     * @return array
     */
    protected function postData($data)
    {
        $transport = Transport::getInstance();

        return $transport->post($this->action(), $data);
    }
}
