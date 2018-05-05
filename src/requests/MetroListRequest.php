<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Metro;

/**
 * Class MetroListRequest Получение списка районов
 *
 * @property int $city Уникальный числовой идентификатор города
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class MetroListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['city'];
    }

    /**
     * @return Metro[]
     * @throws \Exception
     */
    public function getData()
    {
        if (!$this->city) {
            throw new \Exception('City required');
        }

        $data = $this->loadData();

        $result = [];

        foreach ($data['MetroList'] as $metro) {
            $result[] = new Metro($metro);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'metro';
    }
}
