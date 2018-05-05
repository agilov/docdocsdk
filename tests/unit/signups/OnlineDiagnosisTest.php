<?php

namespace tests\unit\signups;

use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\requests\ClinicListRequest;
use agilov\docdocsdk\signups\OnlineDiagnosis;

/**
 * Class OnlineDiagnosisTest
 *
 * vendor/bin/codecept run unit tests/unit/signups/OnlineDiagnosisTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class OnlineDiagnosisTest extends \Codeception\Test\Unit
{

    /**
     * vendor/bin/codecept run unit tests/unit/signups/OnlineDiagnosisTest:testRequest
     */
    public function testRequest()
    {
        $req = new ClinicListRequest(['city'=>1,'start' => 2, 'count' => 1]);
        $clinic = $req->getData();
        expect($clinic[0])->isInstanceOf(Clinic::class);

        $req = new OnlineDiagnosis([
            'name' => 'API test',
            'phone' => '77777777777',
            'clinic' => $clinic[0]->Id,
            'comment' => 'This is an API test request please delete it',
            'diagnostics' => $clinic[0]->Diagnostics[0]->Id,
            'dateAdmission' => date('Y-m-d 14:00', strtotime('tomorrow')),
        ]);

        $result = $req->getData();

        expect(!empty($result['Response']['status']))->true();
        expect(!empty($result['Response']['id']))->true();
        expect(!empty($result['Response']['message']))->true();
        expect($result['Response']['status'])->equals('success');
    }
}
