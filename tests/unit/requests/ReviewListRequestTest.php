<?php

namespace tests\unit\requests;

use agilov\docdocsdk\models\Review;
use agilov\docdocsdk\requests\ReviewListRequest;

/**
 * Class ReviewListRequestTest
 *
 * vendor/bin/codecept run unit tests/unit/requests/ReviewListRequestTest --coverage-html
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ReviewListRequestTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/requests/ReviewListRequestTest:testRequest
     */
    public function testRequest()
    {
        $req = new ReviewListRequest(['doctor' => 22319]);
        $result = $req->getData();
        expect(is_array($result))->true();
        expect(count($result))->greaterThan(0);
        expect($result[0])->isInstanceOf(Review::class);

        foreach ($result as $review){
            expect($review->DoctorId)->equals(22319);
        }
    }
}
