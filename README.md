# CW Fake Client

### Installation

1. Установка пакета в свой проект
```sh
$ composer require double-null/cw-fake-client
```

2. Использование клиента в проекте

```php
use CW\Client;

$client = new Client();
```

### Examples

#### Авторизация

```php
$email = 'example@email.loc';
$password = 'your#^password';

$client::auth()->login($email, $password);
```
#### Запуск рулетки

```php
$result = $client::roulette()->roll();
```

#### Проголосовать за другого юзера

```php
$vote = $client::reputation()->vote($userId);
```

#### Получение списка кланов (поиск)
```php
$search = 'tag'; // Возможное название или тег, 
$clanList = $client::clan()->list($search);
```

#### Получение информации о клане (реквизиты, участники, заявки)
```php
$clanInfo = $client::clan()->info($clanId);
```
