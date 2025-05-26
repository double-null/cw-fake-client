<?php

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Services\Request;

class Clan
{
    private string $url = "http://gw-01.contractwarsgame.com/";

    public function list($search = '') : array
    {
        $time = time() + 3600;
        $url = $this->url . "clans.php";
        $query = [
            'action' => 'list_clans',
            'searchTerm' => $search,
            'expire' => $time,
            'sig' => md5(uniqid(rand(), true)),
        ];

        $url = "$url?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        return json_decode(gzuncompress($response['body']), true) ?? [];
    }

    public function info(int $clanId) : array
    {
        $time = time() + 3600;
        $query = [
            'action' => 'clan_info',
            'clan_id' => $clanId,
            'expire' => $time,
            'sig' => md5(uniqid(rand(), true)),
        ];

        $url = "{$this->url}clans.php?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        return json_decode(gzuncompress($response['body']), true) ?? [];
    }

    public function kick(int $clanId, int $userId) : array
    {
        $time = time() + 3600;
        $query = [
            'action' => 'kick_from_clan',
            'clan_id' => $clanId,
            'user_id' => $userId,
            'expire' => $time,
            'sig' => md5(uniqid(rand(), true)),
        ];

        $url = "{$this->url}clans.php?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        var_dump($response['body']);

        return json_decode(gzuncompress($response['body']), true) ?? [];
    }
}
