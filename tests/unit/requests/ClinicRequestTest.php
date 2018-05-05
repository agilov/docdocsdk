<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\requests\ClinicListRequest;
use agilov\docdocsdk\requests\ClinicRequest;

/**
 * Class ClinicRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/ClinicRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/ClinicRequestTest:testRequest
     */
    public function testRequest()
    {
        $list = new ClinicListRequest(['city' => 1, 'start' => rand(10, 50), 'count' => 1]);
        $res = $list->getData();
        expect(is_array($res))->true();
        expect($res[0])->isInstanceOf(Clinic::class);

        /** @var Clinic $doc */
        $doc = $res[0];

        $req = new ClinicRequest(['clinic' => $doc->Id]);
        $result = $req->getData();
        expect($result)->isInstanceOf(Clinic::class);

        expect($result->Id)->equals($doc->Id);
        expect($result->Name)->equals($doc->Name);
        expect($result->Alias)->equals($doc->Alias);
    }
}
