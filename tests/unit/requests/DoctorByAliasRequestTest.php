<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Doctor;
use agilov\docdocsdk\requests\DoctorListRequest;
use agilov\docdocsdk\requests\DoctorByAliasRequest;

/**
 * Class DoctorByAliasRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/DoctorByAliasRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorByAliasRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/DoctorByAliasRequestTest:testRequest
     */
    public function testRequest()
    {
        $list = new DoctorListRequest(['city' => 1, 'start' => rand(10, 50), 'count' => 1]);
        $res = $list->getData();
        expect(is_array($res))->true();
        expect($res[0])->isInstanceOf(Doctor::class);

        /** @var Doctor $doc */
        $doc = $res[0];

        $req = new DoctorByAliasRequest(['alias' => $doc->Alias]);
        $result = $req->getData();
        expect($result)->isInstanceOf(Doctor::class);

        expect($result->Id)->equals($doc->Id);
        expect($result->Name)->equals($doc->Name);
        expect($result->Alias)->equals($doc->Alias);
        expect($result->AddPhoneNumber)->equals($doc->AddPhoneNumber);
        expect($result->Rating)->equals($doc->Rating);
        expect($result->Price)->equals($doc->Price);
    }
}
