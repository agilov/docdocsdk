<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Review;
use agilov\docdocsdk\models\Slot;

/**
 * Class SlotListRequest Получение полной информации о враче по альясу
 *
 * @property string $doctor ID врача
 * @property string $clinic ID клиники
 * @property string $from Дата с
 * @property string $to Дата пщ
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class SlotListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['doctor', 'clinic', 'from', 'to'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['doctor', 'clinic', 'from', 'to'];
    }

    /**
     * @return Review[]
     */
    public function getData()
    {
        $this->checkRequired();

        $data = $this->loadData();

        $result = [];

        foreach ($data['SlotList'] as $item) {
            $result[] = new Slot($item);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'slot/list';
    }
}
