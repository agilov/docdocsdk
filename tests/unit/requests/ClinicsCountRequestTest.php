<?php

namespace tests\unit\requests;

use agilov\docdocsdk\requests\ClinicsCountRequest;

/**
 * Class ClinicsCountRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/ClinicsCountRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicsCountRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/ClinicsCountRequestTest:testMinimalParamsRequest
     */
    public function testMinimalParamsRequest()
    {
        $req = new ClinicsCountRequest(['city' => 1]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result['Total'])->greaterThan(0);
        expect($result['ClinicSelected'])->greaterThan(0);
        expect($result['ClinicSelected'])->lessOrEquals($result['Total']);

        $stations = new ClinicsCountRequest(['city' => 1, 'stations' => [1,2]]);
        $second = $stations->getData();
        expect($second['Total'])->equals($result['Total']);
        expect($second['ClinicSelected'])->lessThan($second['Total']);
        expect($second['ClinicSelected'])->lessThan($result['ClinicSelected']);
    }
}
