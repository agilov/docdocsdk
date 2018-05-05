<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Stat;

/**
 * Class StatRequest Получение статистики
 *
 * @property int $city Статистика для города. Если отсутствует - для всех городов
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class StatRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['city'];
    }

    /**
     * @return Stat
     */
    public function getData()
    {
        $data = $this->loadData();

        return new Stat($data);
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'stat';
    }
}
