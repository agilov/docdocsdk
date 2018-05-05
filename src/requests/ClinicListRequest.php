<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Clinic;
use agilov\docdocsdk\models\Diagnostic;
use agilov\docdocsdk\models\Metro;
use agilov\docdocsdk\models\Schedule;
use agilov\docdocsdk\models\Service;
use agilov\docdocsdk\models\Spec;

/**
 * Class ClinicListRequest Получение списка клиник
 *
 * @property int $start Начиная с какого порядкого номера вернуть список клиник
 * @property int $count Сколько клиник должно быть в списке (не более 500)
 * @property int $city Идентификатор города
 * @property int $type Тип клиники (1 - Клиника, 2 - Диаг. центр, 3 - Частный врач)
 * @property int $stations Идентификатор станций метро
 * @property int $near Режим поиска рядом:  strict|mixed|extra
 * strict — строгое совпадение по станциям
 * mixed — строгое совпадение по станциям, а потом поиск по ближайшим
 * extra — ?
 *
 * @property int $speciality Идентификатор специальности
 * @property int $district Идентификатор района или имя района
 * @property int $street Идентификатор улицы
 * @property string $order Сортировка:
 * name — по названию клиники
 * Если не указано, то сортируется по рейтингу
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicListRequest extends Request
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
            'type',
            'stations',
            'near',
            'speciality',
            'district',
            'street',
            'order'
        ];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['start', 'count', 'city'];
    }

    /**
     * @inheritdoc
     */
    public function defaults()
    {
        return ['start' => 1, 'count' => 10];
    }

    /**
     * @return Clinic[]
     */
    public function getData()
    {
        $this->loadDefaults();
        $this->checkRequired();

        $data = $this->loadData();
        $result = [];

        $this->total = $data['Total'];

        foreach ($data['ClinicList'] as $clinic) {
            $diagnostics = [];
            $specs = [];
            $stations = [];
            $schedule = [];
            $services = [];

            if (!empty($clinic['Diagnostics'])) {
                foreach ($clinic['Diagnostics'] as $diagnostic) {
                    $diagnostics[] = new Diagnostic($diagnostic);
                }
            }

            if (!empty($clinic['Specialities'])) {
                foreach ($clinic['Specialities'] as $spec) {
                    $specs[] = new Spec($spec);
                }
            }

            if (!empty($clinic['Stations'])) {
                foreach ($clinic['Stations'] as $metro) {
                    $stations[] = new Metro($metro);
                }
            }

            if (!empty($clinic['Schedule'])) {
                foreach ($clinic['Schedule'] as $rec) {
                    $schedule[] = new Schedule($rec);
                }
            }

            if (!empty($clinic['Services']['ServiceList'])) {
                foreach ($clinic['Services']['ServiceList'] as $service) {
                    $services[] = new Service($service);
                }
            }


            $clinic['Specialities'] = $specs;
            $clinic['Diagnostics'] = $diagnostics;
            $clinic['Stations'] = $stations;
            $clinic['Schedule'] = $schedule;
            $clinic['Services'] = $services;

            $result[] = new Clinic($clinic);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'clinic/list';
    }
}
