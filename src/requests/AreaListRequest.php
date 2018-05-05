<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Area;

/**
 * Class AreaListRequest Получение списка округов Москвы
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class AreaListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [];
    }

    /**
     * @return Area[]
     */
    public function getData()
    {
        $data = $this->loadData();

        $result = [];

        foreach ($data['AreaList'] as $area){
            $result[] = new Area($area);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'area';
    }
}
