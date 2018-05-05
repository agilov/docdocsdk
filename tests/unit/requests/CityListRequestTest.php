<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\City;
use agilov\docdocsdk\requests\CityListRequest;

/**
 * Class CityListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/CityListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class CityListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/CityListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new CityListRequest();
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(City::class);
    }
}
