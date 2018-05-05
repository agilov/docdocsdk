<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Doctor;

/**
 * Class DoctorByAliasRequest Получение полной информации о враче по альясу
 *
 * @property string $alias Алиас врача
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorByAliasRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['alias'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['alias'];
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
        return 'doctor/by';
    }
}
