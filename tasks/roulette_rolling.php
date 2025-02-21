<?php

require_once "../vendor/autoload.php";

use CW\Services\Logger;

$client = new \CW\Modules\Client\Services\Client();
$accounts = \CW\Services\AccountService::load();

foreach ($accounts as $account) {
    // Авторизируемся
    $authData = $client::makeAction('Auth')
        ->login($account->login, $account->password);

    // Три раза запускаем рулетку
    for ($i = 0; $i < 3; $i++) {
        $reward = $client::makeAction('Roulette')->roll();
        $logMessage = "ACCOUNT: {$account->login} REWARD: {$reward}";
        Logger::log($logMessage, 'cw');
    }
}
