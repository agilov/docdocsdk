<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Clinic;

/**
 * Class ClinicsCountRequest Получение количества клиник
 *
 * @property int $city Идентификатор города
 * @property int $type Тип клиники (1 - Клиника, 2 - Диаг. центр, 3 - Частный врач)
 * @property int $stations Идентификатор станций метро
 * @property int $speciality Идентификатор специальности
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicsCountRequest extends Request
{
    public $total;

    public $ClinicSelected;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'city',
            'type',
            'stations',
            'speciality'
        ];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['city'];
    }

    /**
     * @return Clinic[]
     */
    public function getData()
    {
        $this->checkRequired();
        $data = $this->loadData();
        $this->total = $data['Total'];
        $this->ClinicSelected = $data['ClinicSelected'];

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'clinic/count';
    }
}
