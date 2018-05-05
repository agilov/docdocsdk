<?php

namespace tests\unit\signups;

use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\requests\ClinicListRequest;
use agilov\docdocsdk\signups\DoctorSelection;

/**
 * Class DoctorSelectionTest
 *
 * vendor/bin/codecept run unit tests/unit/signups/DoctorSelectionTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorSelectionTest extends \Codeception\Test\Unit
{

    /**
     * vendor/bin/codecept run unit tests/unit/signups/DoctorSelectionTest:testRequest
     */
    public function testRequest()
    {
        $req = new ClinicListRequest(['city' => 1, 'start' => 2, 'count' => 1]);
        $clinic = $req->getData();
        expect($clinic[0])->isInstanceOf(Clinic::class);

        $req = new DoctorSelection([
            'name' => 'API test',
            'phone' => '77777777777',
            'comment' => 'This is an API test request please delete it',
            'speciality' => $clinic[0]->Specialities[0]->Id,
            'city' => 1,
            'stations' => $clinic[0]->Stations[0]->Id,
            'departure' => 1,
            'age' => 'adult'
        ]);

        $result = $req->getData();

        expect(!empty($result['Response']['status']))->true();
        expect(!empty($result['Response']['id']))->true();
        expect(!empty($result['Response']['message']))->true();
        expect($result['Response']['status'])->equals('success');
    }
}
