<?php

namespace tests\unit\support;

use agilov\docdocsdk\support\Filesystem;
use agilov\docdocsdk\support\RequestDebugger;

/**
 * Class RequestDebuggerTest
 *
 * vendor/bin/codecept run unit tests/unit/support/RequestDebuggerTest --coverage
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class RequestDebuggerTest extends \Codeception\Test\Unit
{
    /**
     * @var RequestDebugger
     */
    protected $model;

    protected function _before()
    {
        $this->model = new RequestDebugger(['dir' => '/tmp/docdoc']);
        expect($this->model->dir)->equals('/tmp/docdoc');
    }

    protected function _after()
    {
        Filesystem::removeDir($this->model->dir);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/RequestDebuggerTest:testDumpRequest
     */
    public function testDumpRequest()
    {
        $id = 'test_request_' . time();

        $this->model->dumpRequest($id, 'foo');

        expect(file_get_contents($this->model->dir . '/' . $id . '.req.txt'))->equals("foo\n");

        $this->model->dumpRequest($id, 'bar');
        expect(file_get_contents($this->model->dir . '/' . $id . '.req.txt'))->contains('foo');
        expect(file_get_contents($this->model->dir . '/' . $id . '.req.txt'))->contains('bar');
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/RequestDebuggerTest:testSaveResponse
     */
    public function testSaveResponse()
    {
        $id = 'test_request_' . time();

        $this->model->saveResponse($id, '{"foo":"bar"}');
        expect(file_get_contents($this->model->dir . '/' . $id . '.res.json'))->equals('{"foo":"bar"}');

        $this->model->saveResponse($id, '{"bar":"baz"}');
        expect(file_get_contents($this->model->dir . '/' . $id . '.res.json'))->equals('{"bar":"baz"}');
    }
}
