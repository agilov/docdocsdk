<?php

namespace agilov\docdocsdk\signups;

use agilov\docdocsdk\base\Singup;

/**
 * Class DoctorAppointment Запись к врачу
 *
 * @property string $name Имя пациента
 * @property string $phone Номер телефона пациента
 * @property int $doctor ID врача
 * @property int $clinic ID клиники
 * @property string $comment Комментарий пациента
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorAppointment extends Singup
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['doctor', 'clinic']);
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return array_merge(parent::required(), ['doctor', 'clinic']);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $result = $this->postData([
            'name' => $this->name,
            'phone' => $this->phone,
            'doctor' => $this->doctor,
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
