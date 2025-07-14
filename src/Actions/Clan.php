<?php

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Core\Request;

class Clan
{
    public function list($search = '') : array
    {
        $time = time() + 3600;

        $query = [
            'action' => 'list_clans',
            'searchTerm' => $search,
            'expire' => $time,
            'sig' => md5(uniqid(rand(), true)),
        ];

        $url = OpenBox::get('server')."/clans.php?".http_build_query($query);
        
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

        $url = OpenBox::get('server')."/clans.php?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        return json_decode($response['body'], true) ?? [];
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

        $url = OpenBox::get('server')."/clans.php?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        return json_decode(gzuncompress($response['body']), true) ?? [];
    }
}
