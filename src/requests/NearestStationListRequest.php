<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Metro;

/**
 * Class NearestStationListRequest Получение списка ближайших станций метро
 *
 * @property int $id Уникальный числовой идентификатор станции
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class NearestStationListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['id'];
    }

    /**
     * @return Metro[]
     * @throws \Exception
     */
    public function getData()
    {
        if (!$this->id) {
            throw new \Exception('ID required');
        }

        $data = $this->loadData();

        $result = [];

        foreach ($data['StationList'] as $station) {
            $result[] = new Metro($station);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'nearestStation';
    }
}
