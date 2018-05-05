<?php
$transport = require_once __DIR__ . '/_config/_transport.php';

if (!file_exists($transport)) {
    throw new Exception("Please create tests/_config/_transport.php file with array: ['username' => 'foo', 'password' => 'bar']");
}

$transport['debug'] = __DIR__ . '/../runtime/requests';

\agilov\docdocsdk\support\Transport::setInstance($transport);

require __DIR__ . '/../vendor/autoload.php';
