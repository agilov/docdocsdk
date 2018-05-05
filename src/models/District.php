<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class District округ Москвы
 *
 * @property int $Id Уникальный идентификатор района
 * @property string $Alias Наименование района для ЧПУ
 * @property string $Name Наименование района
 * @property Area $Area Округ (только для Москвы)
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class District extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Id', 'Alias', 'Name', 'Area'];
    }
}
