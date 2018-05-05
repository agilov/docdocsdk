<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class SubDiagnostic
 *
 * @property int $Id Уникальный идентификатор услуги
 * @property string $Name Наименование услуги
 * @property string $Alias Наименование услуги для ЧПУ
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class SubDiagnostic extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'Id',
            'Name',
            'Alias'
        ];
    }
}
