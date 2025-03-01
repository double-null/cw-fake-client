<?php

date_default_timezone_set('Europe/Moscow');

use CW\Modules\Client\Enums\VoteCode;
use CW\Services\Logger;

require_once "../vendor/autoload.php";

$client = new \CW\Modules\Client\Services\Client();
$accounts = \CW\Services\AccountService::load();

$forVote = []; //Список ID для накрутки

foreach ($accounts as $account) {
    $auth = $client::makeAction('Auth')
        ->login($account->login, $account->password);

    if (!$auth['data']) continue;

    $usedAttempts = 0;
    foreach($forVote as $target) {
        $vote = $client::makeAction('Reputation')->vote($target);

        if ($vote->code === VoteCode::NO_ATTEMPTS) {
            Logger::log("$account->login HAS NO ATTEMPTS", 'cw_rb');
            break;
        }

        if ($vote->code === VoteCode::SUCCESS) {
            Logger::log("$account->login ADD VOTE FOR $target ($vote->quantity)", 'cw_rb');
            $usedAttempts++;
            if ($usedAttempts == 3) break;
        }
    }
}
