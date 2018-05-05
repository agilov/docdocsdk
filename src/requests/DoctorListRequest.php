<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Doctor;
use agilov\docdocsdk\models\Metro;
use agilov\docdocsdk\models\Spec;

/**
 * Class DoctorListRequest Получение списка специальностей
 *
 * @property int $start Начиная с какого порядкого номера вернуть список врачей
 * @property int $count Сколько врачей должно быть в списке (не более 500)
 * @property int $city Идентификатор города
 * @property int $speciality Идентификатор специальности
 * @property int $area Идентификатор округа
 * @property int $district Идентификатор района
 * @property boolean $deti
 * 1 - выбор врачей, осуществляющих детский прием
 * 0 - выбор врачей, не осуществляющих детский прием
 *
 * @property boolean $nadom
 * 1 - выбор врачей, выезжающих на дом
 * 0 - выбор врачей, не выезжающих на дом
 *
 * @property float $lat Поиск по координатам. Широта
 * @property float $lng Поиск по координатам. Долгота
 * @property int $radius Поиск по координатам. Радиус поиска, км
 * Если ведется поиск по координатам, обязательно должны быть указаны широта и долгота.
 * Если эти параметры будут указаны не полностью, то они будут игнорироваться.
 * Радиус указывать не обязательно.
 *
 * @property string $near Режим поиска рядом:
 * strict — строгое совпадение по станциям
 * mixed — строгое совпадение по станциям + ближайшиие станции
 * extra — строгое совпадение по станциям, а потом поиск по ближайшим и лучшим (добивка до 10 врачей)
 *
 * @property string $order Сортировка: price|experience|rating|rating_internal
 * price — по цене
 * experience — стажу
 * rating — по рейтингу
 * rating_internal — внутренний рейтинг docdoc
 * distance — по расстоянию от точки с заданными координатами (работает только при заданных координат и радиусе, в остальных случаях игнорируется)
 * name — по имени врача
 * По умолчанию метод сортировки по возрастанию (ASC).
 * Для сортировки по убыванию (DESC) необходимо поставить знак минус ( - )перед названием сортировочного поля
 *
 * @property string $typeSearch Тип поиска landing — для страниц лэндинга
 * @property string $street Поиск по улице
 *
 * @property array $stations Список станций метро
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DoctorListRequest extends Request
{
    public $total;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'start',
            'count',
            'city',
            'speciality',
            'area',
            'district',
            'stations',
            'near',
            'order',
            'deti',
            'nadom',
            'typeSearch',
            'lat',
            'lng',
            'radius',
            'street'
        ];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['start', 'count', 'city', 'near'];
    }

    /**
     * @inheritdoc
     */
    public function defaults()
    {
        return ['start' => 1, 'count' => 500, 'near' => 'strict', 'order' => 'price'];
    }

    /**
     * @return Doctor[]
     */
    public function getData()
    {
        $this->loadDefaults();
        $this->checkRequired();

        $data = $this->loadData();
        $result = [];

        $this->total = $data['Total'];

        foreach ($data['DoctorList'] as $doctor) {
            $stations = [];
            $specialities = [];

            if (!empty($doctor['Specialities'])) {
                foreach ($doctor['Specialities'] as $spec) {
                    $specialities[] = new Spec($spec);
                }
            }

            if (!empty($doctor['stations'])) {
                foreach ($doctor['stations'] as $station) {
                    $stations[] = new Metro($station);
                }
            }

            $doctor['stations'] = $stations;
            $doctor['Specialities'] = $specialities;

            $result[] = new Doctor($doctor);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'doctor/list';
    }
}
