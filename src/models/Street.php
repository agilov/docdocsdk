<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Street
 *
 * @property int $Id
 * @property int $CityId Уникальный идентификатор города
 * @property string $Title Название улицы
 * @property string $RewriteName Название улицы для ЧПУ
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Street extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Id', 'CityId', 'Title', 'RewriteName'];
    }
}
