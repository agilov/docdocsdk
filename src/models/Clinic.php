<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Clinic клиника
 *
 * @property int $Id Уникальный идентификатор клиники
 * @property boolean $OnlineBooking Возможность онлайн бронирования
 * @property boolean $OnlineRecordDoctor Возможность онлайн записи
 * @property int $MinPrice Минимальная цена первичного приема
 * @property int $MaxPrice Максимальная цена первичного приема
 * @property int $Order Порядок вывода
 * @property int $Rating Рейтинг клиники
 * @property int $ParentId Родительская клиника
 * @property float $Longitude Долгота
 * @property float $Latitude Широта
 * @property string $Name Название клиники
 * @property string $ShortName Название клиники
 * @property string $RewriteName Краткое название клиники
 * @property string $Alias Алиас
 * @property string $URL Адрес url
 * @property string $Url Адрес url
 * @property string $City Идентификатор города
 * @property string $Street Улица
 * @property int $StreetId Идентификатор улицы
 * @property string $House Дом
 * @property string $Description Описание
 * @property string $ShortDescription Краткое описание
 * @property string $Phone Контактный телефон
 * @property string $PhoneAppointment Телефон для записи
 * @property string $ReplacementPhone Подменный телефон для клиники
 * @property string $logoPath Название файла логотипа
 * @property string $ScheduleState Работа по онлайн расписанию
 * @property string $DistrictId Идентификатор района
 * @property string $Email Email
 * @property string $Logo Ссылка на логотип
 * @property string $TypeOfInstitution
 *
 *
 * @property string $IsDiagnostic Флаг - диагностический центр (yes/no)
 * @property string $isClinic Флаг - клиника (yes/no)
 * @property string $IsDoctor Флаг - частный врач (yes/no)
 * @property boolean $IsActive
 *
 * @property Diagnostic[] $Diagnostics Список исследований
 * @property Metro[] $Stations Список станций метро
 * @property Spec[] $Specialities Список специальностей
 * @property Service[] $Services Список услуг
 * @property array $Schedule Время работы по дням недели
 * @property array $BranchesId Массив ветвей медицины
 * @property array $Doctors Массив ID врачей
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Clinic extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'Id',
            'OnlineBooking',
            'MinPrice',
            'MaxPrice',
            'Longitude',
            'Latitude',
            'Name',
            'ShortName',
            'RewriteName',
            'Alias',
            'URL',
            'Url',
            'City',
            'Street',
            'StreetId',
            'House',
            'Description',
            'ShortDescription',
            'Phone',
            'PhoneAppointment',
            'ReplacementPhone',
            'logoPath',
            'ScheduleState',
            'DistrictId',
            'Email',
            'Logo',
            'IsDiagnostic',
            'isClinic',
            'IsDoctor',
            'Diagnostics',
            'Stations',
            'Specialities',
            'Schedule',
            'BranchesId',
            'Services',
            'Order',
            'Rating',
            'TypeOfInstitution',
            'ParentId',
            'Doctors',
            'OnlineRecordDoctor',
            'IsActive',
        ];
    }
}
