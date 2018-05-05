<?php

namespace agilov\docdocsdk\signups;

use agilov\docdocsdk\base\Singup;

/**
 * Class OnlineDiagnosis Запись к врачу
 *
 * @property string $name Имя пациента
 * @property string $phone Номер телефона пациента
 * @property int $clinic ID клиники
 * @property int $diagnostics ID диагностики
 * @property int $subdiagnostics ID диагностики
 * @property string $dateAdmission Дата приема
 * @property string $comment Комментарий пациента
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class OnlineDiagnosis extends Singup
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['diagnostics', 'clinic', 'subdiagnostics', 'dateAdmission']);
    }

    /**
     * @inheritdoc
     */
    public function required()
    {
        return array_merge(parent::required(), ['clinic','diagnostics', 'dateAdmission']);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $result = $this->postData([
            'name' => $this->name,
            'phone' => $this->phone,
            'diagnostics' => $this->diagnostics,
            'subdiagnostics' => $this->subdiagnostics,
            'dateAdmission' => $this->dateAdmission,
            'clinic' => $this->clinic,
            'comment' => $this->comment
        ]);

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'request';
    }
}
