<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\requests\ClinicListRequest;

/**
 * Class ClinicListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/ClinicListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/ClinicListRequestTest:testMinimalParamsRequest
     */
    public function testMinimalParamsRequest()
    {
        $req = new ClinicListRequest(['city' => 1]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(Clinic::class);
        foreach ($result as $clinic) {
            expect($clinic->City)->equals('Москва');

            expect($clinic->Diagnostics)->notEquals(null);
            expect($clinic->Stations)->notEquals(null);
            expect($clinic->Services)->notEquals(null);
            expect($clinic->Schedule)->notEquals(null);
            expect($clinic->BranchesId)->notEquals(null);
        }
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/ClinicListRequestTest:testStations
     */
    public function testStations()
    {
        $stations = [1, 2, 3];
        $req = new ClinicListRequest(['city' => 1, 'stations' => $stations]);
        $result = $req->getData();

        foreach ($result as $clinic) {
            $hasStationInList = false;

            expect(count($clinic->Stations))->greaterThan(0);

            foreach ($clinic->Stations as $station) {
                if (in_array($station->Id, $stations)) {
                    $hasStationInList = true;
                    break;
                }
            }

            expect($hasStationInList)->true();
        }
    }


    /**
     * todo rating sort error found
     *
     * vendor/bin/codecept run unit tests/unit/requests/ClinicListRequestTest:testDefaultSort
     */
    public function testDefaultSort()
    {
        return;
        $req = new ClinicListRequest(['city' => 1]);
        $result = $req->getData();
        $before = 0;

        foreach ($result as $clinic) {
            if ($before === 0) {
                $before = $clinic->Rating;
            }

            expect($clinic->Rating)->lessOrEquals($before);

            $before = $clinic->Rating;
        }
    }
}
