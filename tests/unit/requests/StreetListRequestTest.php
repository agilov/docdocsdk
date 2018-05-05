<?php

namespace tests\unit\requests;

use agilov\docdocsdk\requests\StreetListRequest;

/**
 * Class StreetListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/StreetListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class StreetListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/StreetListRequestTest:testRequestNoParams
     */
    public function testRequestNoParams()
    {
        $this->expectExceptionMessage('City required');
        $req = new StreetListRequest();
        $req->getData();
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/StreetListRequestTest:testRequestMsk
     */
    public function testRequestMsk()
    {
        $msk = new StreetListRequest(['city' => 1]);
        expect($msk->buildRequest())->equals('city/1');
        $result = $msk->getData();

        foreach ($result as $street) {
            expect($street->CityId)->equals(1);
        }
    }
}
