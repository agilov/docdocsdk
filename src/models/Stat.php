<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Stat Получение статистики
 *
 * @property int $Requests количество заявок поданное за последние сутки
 * @property int $Doctors Количество докторов в базе
 * @property int $Reviews Количество отзывов в базе
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Stat extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Requests', 'Doctors', 'Reviews'];
    }
}
