<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Slot
 *
 * @property int $Id
 * @property string $StartTime
 * @property string $FinishTime
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Slot extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [

            "Id",
            "StartTime",
            "FinishTime",
        ];
    }
}
