<?php

namespace tests\unit\signups;

use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\requests\ClinicRequest;
use agilov\docdocsdk\signups\DoctorAppointment;

/**
 * Class DoctorAppointmentTest
 *
 * vendor/bin/codecept run unit tests/unit/signups/DoctorAppointmentTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorAppointmentTest extends \Codeception\Test\Unit
{

    /**
     * vendor/bin/codecept run unit tests/unit/signups/DoctorAppointmentTest:testRequest
     */
    public function testRequest()
    {
        $req = new ClinicRequest(['clinic' => 1]);
        $result = $req->getData();
        expect($result)->isInstanceOf(Clinic::class);

        $req = new DoctorAppointment([
            'name' => 'API test',
            'phone' => '77777777777',
            'clinic' => $result->Id,
            'doctor' => $result->Doctors[0],
            'comment' => 'This is an API test request please delete it'
        ]);

        $result = $req->getData();

        expect(!empty($result['Response']['status']))->true();
        expect(!empty($result['Response']['id']))->true();
        expect(!empty($result['Response']['message']))->true();
        expect($result['Response']['status'])->equals('success');
    }
}
