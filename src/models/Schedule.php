<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Schedule
 *
 * @property int $Day
 * @property string $StartTime
 * @property string $EndTime
 * @property string $DayTitle
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Schedule extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['Day', 'StartTime', 'EndTime', 'DayTitle'];
    }
}
