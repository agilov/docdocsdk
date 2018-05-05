<?php

namespace tests\unit\requests;

use agilov\docdocsdk\requests\MetroListRequest;
use agilov\docdocsdk\requests\NearestStationListRequest;

/**
 * Class NearestStationListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/NearestStationListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class NearestStationListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/NearestStationListRequestTest:testRequestNoParams
     */
    public function testRequestNoParams()
    {
        $this->expectExceptionMessage('ID required');
        $req = new NearestStationListRequest();
        $req->getData();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/NearestStationListRequestTest:testRequestWrongId
     */
    public function testRequestWrongId()
    {
        $req = new NearestStationListRequest(['id' => 'wrong']);
        expect($req->buildRequest())->equals('id/wrong');
        $result = $req->getData();
        expect(count($result))->equals(0);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/NearestStationListRequestTest:testRequestStation
     */
    public function testRequestStation()
    {
        $metros = (new MetroListRequest(['city' => 1]))->getData();

        $first = $metros[array_rand($metros)];

        $req = new NearestStationListRequest(['id' => $first->Id]);

        expect($req->buildRequest())->equals('id/' . $first->Id);
        $result = $req->getData();
        expect(count($result))->greaterThan(0);
    }
}
