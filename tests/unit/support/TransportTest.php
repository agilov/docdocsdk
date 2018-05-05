<?php

namespace tests\unit\support;

use agilov\docdocsdk\support\Transport;

/**
 * Class TransportTest
 *
 * vendor/bin/codecept run unit tests/unit/support/TransportTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class TransportTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/support/TransportTest:testSetInstance
     */
    public function testSetInstance()
    {
        $old = Transport::getInstance();

        Transport::setInstance(['username' => 'lol', 'password' => 'kek']);
        $transport = Transport::getInstance();
        expect($transport)->isInstanceOf('agilov\docdocsdk\support\Transport');
        expect($transport->username)->equals('lol');
        expect($transport->password)->equals('kek');

        Transport::setInstance(['username' => $old->username, 'password' => $old->password]);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/TransportTest:testIncorrectConstruct
     */
    public function testIncorrectConstruct()
    {
        $this->expectExceptionMessage('Username and password is required');
        new Transport();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/TransportTest:testInvalidServerResponse
     */
    public function testInvalidServerResponse()
    {
        $this->expectExceptionMessage('Invalid server response');
        $transport = new Transport(['username' => 'foo', 'password' => 'bar']);
        $transport->request('foo/bar');
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/TransportTest:testErrorMessage
     */
    public function testErrorMessage()
    {
        $this->expectExceptionMessage('Error: Неправильная строка запроса');
        $transport = Transport::getInstance();
        $transport->request('foo/bar');
    }

    /**
     * vendor/bin/codecept run unit tests/unit/support/TransportTest:testCorrectRequest
     */
    public function testCorrectRequest()
    {
        $transport = Transport::getInstance();
        $result = $transport->request('stat/city/1');
        expect($result)->hasKey('Requests');
        expect($result)->hasKey('Doctors');
        expect($result)->hasKey('Reviews');
    }
}
