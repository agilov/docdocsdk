<?php

namespace tests\unit\requests;

use agilov\docdocsdk\requests\MetroListRequest;

/**
 * Class MetroListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/MetroListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class MetroListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/MetroListRequestTest:testRequestNoParams
     */
    public function testRequestNoParams()
    {
        $this->expectExceptionMessage('City required');
        $req = new MetroListRequest();
        $req->getData();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/MetroListRequestTest:testRequestWrongCity
     */
    public function testRequestWrongCity()
    {
        $req = new MetroListRequest(['city' => 'wrong']);
        expect($req->buildRequest())->equals('city/wrong');
        $result = $req->getData();
        expect(count($result))->equals(0);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/MetroListRequestTest:testRequestMsk
     */
    public function testRequestMsk()
    {
        $msk = new MetroListRequest(['city' => 1]);
        expect($msk->buildRequest())->equals('city/1');
        $result = $msk->getData();

        foreach ($result as $metro) {
            expect($metro->CityId)->equals(1);
        }
    }
}
