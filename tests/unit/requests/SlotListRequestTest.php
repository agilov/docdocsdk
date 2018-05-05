<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Slot;
use agilov\docdocsdk\requests\ClinicListRequest;
use agilov\docdocsdk\requests\ClinicRequest;
use agilov\docdocsdk\requests\SlotListRequest;

/**
 * Class SlotListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/SlotListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class SlotListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/SlotListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new SlotListRequest([
            'doctor' => 43,
            'clinic' => 13,
            'from' => date('Y-m-01'),
            'to' => date('Y-m-d'),
        ]);
        $result = $req->getData();
        expect(is_array($result))->true();
//        expect(count($result))->greaterThan(0);
//        expect($result[0])->isInstanceOf(Slot::class);
//
//        foreach ($result as $slot){
//            expect($slot->DoctorId)->equals(22319);
//        }
    }
}
