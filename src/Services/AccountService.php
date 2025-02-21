<?php

namespace CW\Services;

class AccountService
{
    public static function load() : array
    {
        $accounts = [];
        $file = __DIR__ . "/../../".$_ENV['ACCOUNTS'];
        $data = file_get_contents($file);
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if ($ext == "b64") {
            $data = base64_decode($data);
        }

        foreach (explode("\n", $data) as $line) {
            $details = explode(":", $line);
            $account = new \stdClass();
            $account->login = $details[0];
            $account->password = $details[1];
            $accounts[] = $account;
        }

        return $accounts;
    }
}
