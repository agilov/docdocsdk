<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\City;

/**
 * Class CityListRequest Получение списка городов
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class CityListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [];
    }

    /**
     * @return City[]
     */
    public function getData()
    {
        $data = $this->loadData();
        $result = [];

        foreach ($data['CityList'] as $city) {
            $result[] = new City($city);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'city';
    }
}
