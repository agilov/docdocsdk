<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Area;
use agilov\docdocsdk\models\District;
use agilov\docdocsdk\models\Review;

/**
 * Class NearDistrictsListRequest Получение списка ближайших районов
 *
 * @property string $id ID района
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class NearDistrictsListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['id', 'limit'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['id', 'limit'];
    }

    /**
     * @inheritdoc
     */
    public function defaults()
    {
        return ['limit' => 10];
    }

    /**
     * @return Review[]
     */
    public function getData()
    {
        $this->loadDefaults();
        $this->checkRequired();

        $data = $this->loadData();

        $result = [];

        foreach ($data['DistrictList'] as $item) {
            if (!empty($district['Area'])) {
                $district['Area'] = new Area($item['Area']);
            }

            $result[] = new District($item);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'nearDistricts';
    }
}
