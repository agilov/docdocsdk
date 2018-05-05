<?php

namespace agilov\docdocsdk\requests;

use agilov\docdocsdk\base\Request;
use agilov\docdocsdk\models\Diagnostic;
use agilov\docdocsdk\models\SubDiagnostic;

/**
 * Class DiagnosticListRequest Получение списка диагностических услуг и подуслуг
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class DiagnosticListRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [];
    }

    /**
     * @return Diagnostic[]
     */
    public function getData()
    {
        $data = $this->loadData();
        $result = [];

        foreach ($data['DiagnosticList'] as $item) {
            $subs = [];
            if (!empty($item['SubDiagnosticList'])) {
                foreach ($item['SubDiagnosticList'] as $sub) {
                    $subs[] = new SubDiagnostic($sub);
                }
            }

            $item['SubDiagnosticList'] = $subs;

            $result[] = new Diagnostic($item);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function action()
    {
        return 'diagnostic';
    }
}
