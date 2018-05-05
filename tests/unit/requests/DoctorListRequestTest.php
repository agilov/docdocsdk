<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Doctor;
use agilov\docdocsdk\requests\DoctorListRequest;

/**
 * Class DoctorListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/DoctorListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/DoctorListRequestTest:testMinimalParamsRequest
     */
    public function testMinimalParamsRequest()
    {

        $req = new DoctorListRequest(['city' => 1, 'stations' => 1]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(Doctor::class);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/DoctorListRequestTest:testDeti
     */
    public function testDeti()
    {
        $req = new DoctorListRequest(['city' => 1, 'stations' => 1, 'deti' => 1]);
        $result = $req->getData();
        foreach ($result as $doctor) {
            expect($doctor->KidsReception)->equals(1);
        }
    }

    /**
     * todo detected price sort error report to API developer
     *
     * vendor/bin/codecept run unit tests/unit/requests/DoctorListRequestTest:testSort
     */
    public function testSort()
    {
        $data = [
//            'price' => 'Price',
            'experience' => 'ExperienceYear',
            'rating' => 'Rating',
            'rating_internal' => 'InternalRating',
        ];

        foreach ($data as $order => $attribute) {
            // ASC sort
            $req = new DoctorListRequest(['city' => 1, 'stations' => 1, 'order' => $order]);
            $result = $req->getData();
            $before = 0;

            foreach ($result as $doctor) {
                if ($before === 0) {
                    $before = $doctor->getAttribute($attribute);
                }

                expect($doctor->getAttribute($attribute))->greaterOrEquals($before);

                $before = $doctor->getAttribute($attribute);
            }

            // DESC sort
            $req = new DoctorListRequest(['city' => 1, 'stations' => 1, 'order' => '-' . $order]);
            $result = $req->getData();
            $before = 0;

            foreach ($result as $doctor) {
                if ($before === 0) {
                    $before = $doctor->getAttribute($attribute);
                }

                expect($doctor->getAttribute($attribute))->lessOrEquals($before);

                $before = $doctor->getAttribute($attribute);
            }
        }
    }
}
