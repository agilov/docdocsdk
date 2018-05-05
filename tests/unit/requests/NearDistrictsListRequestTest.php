<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Area;
use agilov\docdocsdk\models\District;
use agilov\docdocsdk\requests\AreaListRequest;
use agilov\docdocsdk\requests\NearDistrictsListRequest;

/**
 * Class NearDistrictsListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/NearDistrictsListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class NearDistrictsListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/NearDistrictsListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new NearDistrictsListRequest(['id' => 1]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(District::class);
    }

}
