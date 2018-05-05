<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Spec;
use agilov\docdocsdk\requests\SpecListRequest;

/**
 * Class SpecListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/SpecListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class SpecListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/SpecListRequestTest:testRequestNoParams
     */
    public function testRequestNoParams()
    {
        $req = new SpecListRequest();
        $result = $req->getData();
        expect(count($result))->greaterThan(0);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/SpecListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new SpecListRequest(['city' => 1]);
        $result = $req->getData();
        expect(count($result))->greaterThan(0);
        expect($result[0])->isInstanceOf(Spec::className());
        foreach ($result as $spec) {
            expect($spec->IsSimple)->true();
        }
    }
}
