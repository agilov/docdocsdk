<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class ClinicImage
 *
 * @property string $url
 * @property string $description
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class ClinicImage extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['url', 'description'];
    }
}
