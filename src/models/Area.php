<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Area округ Москвы
 *
 * @property int $Id Уникальный идентификатор округа
 * @property string $Alias Наименование округа для ЧПУ
 * @property string $Name Наименование округа
 * @property string $FullName Полное название округа
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Area extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Id', 'Alias', 'Name', 'FullName'];
    }
}
