<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Service
 *
 * @property int $ServiceId
 * @property string $ServiceName
 * @property int $Price
 * @property int $SpecialPrice
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Service extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['ServiceId', 'ServiceName', 'Price', 'SpecialPrice'];
    }
}
