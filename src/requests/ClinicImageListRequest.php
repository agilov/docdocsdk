<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\ClinicImage;
use agilov\docdocsdk\models\Review;

/**
 * Class ClinicImageListRequest Получение список изображений клиники
 *
 * @property string $id ID Клиники
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicImageListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['id'];
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

        foreach ($data['ImageList'] as $item) {
            $result[] = new ClinicImage($item);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function buildRequest()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'clinic/gallery';
    }
}
