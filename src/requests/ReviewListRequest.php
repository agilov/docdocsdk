<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Review;

/**
 * Class ReviewListRequest Получение полной информации о враче по альясу
 *
 * @property string $doctor Алиас врача
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ReviewListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['doctor'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['doctor'];
    }

    /**
     * @return Review[]
     */
    public function getData()
    {
        $this->checkRequired();

        $data = $this->loadData();

        $result = [];

        foreach ($data['ReviewList'] as $review) {
            $result[] = new Review($review);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'review';
    }
}
