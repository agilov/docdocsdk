<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Area;
use agilov\docdocsdk\models\District;

/**
 * Class DistrictListRequest Получение списка районов
 *
 * @property int $city Уникальный числовой идентификатор города
 * @property int $area Уникальный числовой идентификатор округа
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DistrictListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['city', 'area'];
    }

    /**
     * @return District[]
     */
    public function getData()
    {
        $data = $this->loadData();

        $result = [];

        foreach ($data['DistrictList'] as $district) {
            if (!empty($district['Area'])) {
                $district['Area'] = new Area($district['Area']);
            }

            $result[] = new District($district);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'district';
    }
}
