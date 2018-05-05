<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Metro станция метро
 *
 * @property int $Id Уникальный идентификатор станции метро
 * @property string $Alias Наименование станции для ЧПУ
 * @property string $Name Наименование станции
 * @property string $LineName Имя линии станций метро
 * @property string $LineColor Цвет линии станций метро
 * @property int $CityId Уникальный идентификатор города
 * @property array $DistrictIds Идентификаторы районов
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Metro extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Id', 'Alias', 'Name', 'LineName', 'LineColor', 'CityId', 'DistrictIds'];
    }
}
