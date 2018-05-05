<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Street;

/**
 * Class StreetListRequest Получение списка улиц
 *
 * @property int $city Уникальный числовой идентификатор города
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class StreetListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['city'];
    }

    /**
     * @return Street[]
     * @throws \Exception
     */
    public function getData()
    {
        if (!$this->city) {
            throw new \Exception('City required');
        }

        $data = $this->loadData();

        $result = [];

        foreach ($data['StreetList'] as $station) {
            $result[] = new Street($station);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'street';
    }
}
