<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Spec;

/**
 * Class SpecListRequest Получение списка специальностей
 *
 * @property int $city Уникальный числовой идентификатор города
 * @property int $onlySimple Получать только уникальные
 * 1 - получать только уникальные специальности (стоит по умолчанию)
 * 0 - не обращать внимание на уникальность специальности, выбирать с двойными
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class SpecListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['city', 'onlySimple'];
    }

    /**
     * @return Spec[]
     */
    public function getData()
    {
        if (empty($this->onlySimple)) {
            $this->onlySimple = 1;
        }

        $data = $this->loadData();
        $result = [];

        foreach ($data['SpecList'] as $spec) {
            $result[] = new Spec($spec);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'speciality';
    }
}
