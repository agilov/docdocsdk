<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Stat;
use agilov\docdocsdk\requests\StatRequest;

/**
 * Class StatRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/StatRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class StatRequestTest extends \Codeception\Test\Unit
{
    /**
     * @var StatRequest
     */
    protected $request;

    /**
     *
     */
    protected function _before()
    {
        $this->request = new StatRequest();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/StatRequestTest:testNoCity
     */
    public function testNoCity()
    {
        $result = $this->request->getData();
        expect($result)->isInstanceOf(Stat::class);
        expect($result->Doctors)->notEmpty();
        expect($result->Requests)->notEmpty();
        expect($result->Reviews)->notEmpty();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/StatRequestTest:testWithCity
     */
    public function testWithCity()
    {
        expect($this->request->buildRequest())->equals('');
        $noCity = $this->request->getData();

        // Set Moscow city
        $this->request->city = 1;
        expect($this->request->buildRequest())->equals('city/1');
        $msk = $this->request->getData();

        expect($msk->Doctors)->lessThan($noCity->Doctors);
        expect($msk->Requests)->lessThan($noCity->Requests);
        expect($msk->Reviews)->lessThan($noCity->Reviews);
    }
}
