<?php

namespace agilov\docdocsdk\signups;

use agilov\docdocsdk\base\Singup;

/**
 * Class ClinicAppointment Запись к врачу
 *
 * @property string $name Имя пациента
 * @property string $phone Номер телефона пациента
 * @property int $clinic ID клиники
 * @property int $speciality ID Специальности
 * @property string $comment Комментарий пациента
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicAppointment extends Singup
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['speciality', 'clinic']);
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return array_merge(parent::required(), ['clinic']);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $result = $this->postData([
            'name' => $this->name,
            'phone' => $this->phone,
            'speciality' => $this->speciality,
            'clinic' => $this->clinic,
            'comment' => $this->comment
        ]);

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'request';
    }
}
