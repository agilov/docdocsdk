<?php

namespace agilov\docdocsdk\support;

use agilov\docdocsdk\base\Obj;

/**
 * Class RequestDebug
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class RequestDebugger extends Obj
{
    /**
     * @var string
     */
    public $dir = false;

    /**
     * Creating directory if dir
     */
    public function init()
    {
        if ($this->dir) {
            Filesystem::createDir($this->dir);
        }
    }

    /**
     * @param $id
     * @param $content
     */
    public function dumpRequest($id, $content)
    {
        if ($this->dir) {
            $file = $this->dir . '/' . $id . '.req.txt';

            file_put_contents($file, $content . "\n", FILE_APPEND);
        }
    }

    /**
     * @param $id
     * @param $res
     */
    public function saveResponse($id, $res)
    {
        if ($this->dir) {
            file_put_contents($this->dir . '/' . $id . '.res.json', $res);
        }
    }
}
