<?php

namespace agilov\docdocsdk\base;

/**
 * Class Singup Получение статистики
 *
 * @property string $name Имя пациента
 * @property string $phone Номер телефона пациента
 * @property string $comment Комментарий пациента
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
abstract class Singup extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return ['name', 'phone', 'comment'];
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return ['name', 'phone'];
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'request';
    }
}
