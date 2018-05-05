<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Doctor;

/**
 * Class DoctorRequest Получение полной информации о враче
 *
 * @property int $doctor ID врача
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['doctor'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['doctor'];
    }

    /**
     * @return Doctor
     */
    public function getData()
    {
        $this->checkRequired();

        $data = $this->loadData();

        return new Doctor($data['Doctor'][0]);
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return '';
    }
}
