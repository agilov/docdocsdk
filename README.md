# SDK для партнерского API DocDoc 

[Официальная документация API SDK](https://partner.docdoc.ru/hc/ru/articles/205563222)

Вы можете дополнять этот документ новыми примерами. 
Для этого просто форкайте репозиторий, вносите изменения и делайте пулл реквест.

### Установка

Используйте [composer](http://getcomposer.org/download/).

```
composer require agilov/docdocsdk
```

Или добавьте "agilov/docdocsdk": "*" в require секцию вашего composer.json.

Или просто скачайте репозиторий, положите исходники куда вам нужно,
подключите их к своему проекту как нибудь и пользуйтесь!

### Пример запроса списка клиник:

```php

use agilov\docdocsdk\support\Transport;
use agilov\docdocsdk\requests\ClinicListRequest;

// Установка логина и пароля 
// + включение дебаг мода с сохранением дампов запросов в указанную директорию
Transport::setInstance([
    'username' => 'username',
    'password' => 'crazypass',
    'debug' => '/tmp/debug/directory/for/requests/dumps'
]);

// Формирование запроса 
$req = new ClinicListRequest([
    'city' => 1, // Идентификатор города Москва
    'start' => 100, // Начать с сотой по счету клиники в выдаче 
    'count' => 100, // Получить 100 клиник
    'order' => 'name' // Сортировать по названию
]);

// Выполнение запроса
$result = $req->getData();

// Узнаем сколько всего можно получить клиник
$total = (int)$req->total;

foreach ($result as $row) {
    // обработка моделей клиник
}
```

### Классы запросов

На каждый тип запроса в API есть свой класс с параметрами 
и логикой обработки JSON ответа.

Больше примеров использования классов запросов можно увидеть, 
читая исходники в папке tests.

