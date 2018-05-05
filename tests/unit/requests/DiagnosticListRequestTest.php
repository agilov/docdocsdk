<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Diagnostic;
use agilov\docdocsdk\requests\DiagnosticListRequest;

/**
 * Class DiagnosticListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/DiagnosticListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DiagnosticListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/DiagnosticListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new DiagnosticListRequest();
        $result = $req->getData();

        $subs = 0;

        expect(count($result))->greaterThan(0);
        expect($result[0])->isInstanceOf(Diagnostic::className());

        foreach ($result as $diagnostic) {
            if ($diagnostic->SubDiagnosticList) {
                $subs++;
            }
        }

        expect($subs)->greaterThan(0);
    }

}
