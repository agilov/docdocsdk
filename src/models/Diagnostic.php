<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Diagnostic
 *
 * @property int $Id Уникальный идентификатор услуги
 * @property string $Name Наименование услуги
 * @property string $Alias Наименование услуги для ЧПУ
 * @property int $Price Цена
 * @property int $SpecialPrice Спец. цена
 * @property SubDiagnostic[] $SubDiagnosticList Подуслуги
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Diagnostic extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'Id',
            'Name',
            'Alias',
            'Price',
            'SpecialPrice',
            'SubDiagnosticList'
        ];
    }
}
