<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Spec
 *
 * @property int $Id Уникальный идентификатор специальности
 * @property string $Name Наименование специальности
 * @property string $Alias Наименование специальности для ЧПУ
 * @property string $NameGenitive Наименование в родительном падеже
 * @property string $NamePlural Наименование во множественном числе
 * @property string $NamePluralGenitive Наименование в родительном падеже во множественном числе
 * @property boolean $IsSimple
 * @property string $BranchName
 * @property string $BranchAlias
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Spec extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'Id',
            'Alias',
            'Name',
            'NameGenitive',
            'NamePlural',
            'NamePluralGenitive',
            'IsSimple',
            'BranchName',
            'BranchAlias'
        ];
    }
}
