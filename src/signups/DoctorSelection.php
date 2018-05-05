<?php

namespace agilov\docdocsdk\signups;

use agilov\docdocsdk\base\Singup;

/**
 * Class DoctorSelection Подбор врача
 *
 * @property string $name Имя пациента
 * @property string $phone Номер телефона пациента
 * @property int $speciality ID специальности
 * @property int $city ID города
 * @property array $stations Массив ID станций
 * @property int $departure Выезд на дом
 * @property string $age Взрослй/детский врач 'adult' / 'child' / 'multy'
 * @property string $comment Комментарий пациента
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorSelection extends Singup
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['speciality', 'city', 'stations', 'departure', 'age']);
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
            'city' => $this->city,
            'stations' => $this->stations,
            'departure' => $this->departure,
            'age' => $this->age,
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
