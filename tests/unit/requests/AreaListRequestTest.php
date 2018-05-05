<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Area;
use agilov\docdocsdk\requests\AreaListRequest;

/**
 * Class AreaListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/AreaListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class AreaListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/AreaListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new AreaListRequest();
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(Area::class);
    }
}
