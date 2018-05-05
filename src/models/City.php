<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class City Город
 *
 * @property int $Id Уникальный идентификатор города
 * @property string $Name Наименование города
 * @property string $Alias Наименование города для ЧПУ
 * @property string $Phone Номер телефона
 * @property float $Latitude Широта
 * @property float $Longitude Долгота
 * @property int $SearchType
 * @property boolean $HasDiagnostic
 * @property int $TimeZone
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class City extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Id', 'Name', 'Alias', 'Phone', 'Latitude', 'Longitude', 'SearchType', 'HasDiagnostic', 'TimeZone'];
    }
}
