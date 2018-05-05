<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Clinic;

/**
 * Class ClinicRequest Получение полной информации о враче
 *
 * @property int $clinic ID врача
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['clinic'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['clinic'];
    }

    /**
     * @return Clinic
     */
    public function getData()
    {
        $this->checkRequired();

        $data = $this->loadData();

        return new Clinic($data['Clinic'][0]);
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return '';
    }
}
