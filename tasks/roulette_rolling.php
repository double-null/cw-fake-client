<?php

date_default_timezone_set('Europe/Moscow');

use CW\Entities\Scenario;
use CW\Services\Logger;

require __DIR__ . '/../bootstrap/app.php';

$client = new \CW\Modules\Client\Services\Client();

$scenario = $em
    ->getRepository(Scenario::class)
    ->findOneByTag('roulette_rolling');

foreach ($scenario->getAccounts() as $account) {
    // Авторизируемся
    $authData = $client::makeAction('Auth')
        ->login($account->getEmail(), $account->getPassword());

    // Три раза запускаем рулетку
    for ($i = 0; $i < 3; $i++) {
        $reward = $client::makeAction('Roulette')->roll();
        $logMessage = "ACCOUNT: {$account->getEmail()} REWARD: {$reward}";
        Logger::log($logMessage, 'cw');
    }
}
