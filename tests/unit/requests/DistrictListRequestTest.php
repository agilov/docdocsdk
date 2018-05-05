<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Area;
use agilov\docdocsdk\models\District;
use agilov\docdocsdk\requests\AreaListRequest;
use agilov\docdocsdk\requests\DistrictListRequest;

/**
 * Class DistrictListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/DistrictListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DistrictListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/DistrictListRequestTest:testRequestNoParams
     */
    public function testRequestNoParams()
    {
        $req = new DistrictListRequest();
        $result = $req->getData();
        expect(is_array($result))->true();
        expect($result[0])->isInstanceOf(District::class);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/DistrictListRequestTest:testRequestWrongCity
     */
    public function testRequestWrongCity()
    {
        $req = new DistrictListRequest(['city' => 'wrong']);
        expect($req->buildRequest())->equals('city/wrong');
        $result = $req->getData();
        expect(count($result))->equals(0);
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/DistrictListRequestTest:testRequestMsk
     */
    public function testRequestMsk()
    {
        $all = new DistrictListRequest();
        $msk = new DistrictListRequest(['city' => 1]);
        expect($msk->buildRequest())->equals('city/1');
        expect(count($msk->getData()))->lessThan(count($all->getData()));
    }

    /**
     * vendor/bin/codecept run unit tests/unit/requests/DistrictListRequestTest:testArea
     */
    public function testArea()
    {
        $areas = (new AreaListRequest())->getData();

        $area = $areas[array_rand($areas)];

        $req = new DistrictListRequest(['city' => 1, 'area' => $area->Id]);

        $result = $req->getData();
        expect(count($result))->greaterThan(0);

        foreach ($result as $district) {
            expect($district->Area)->isInstanceOf(Area::className());
            expect($district->Area->Id)->equals($area->Id);
        }
    }
}
