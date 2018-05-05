<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\ClinicImage;
use agilov\docdocsdk\requests\ClinicImageListRequest;

/**
 * Class ClinicImageListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/ClinicImageListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicImageListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/ClinicImageListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new ClinicImageListRequest(['id' => 1]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(ClinicImage::class);
    }

}
