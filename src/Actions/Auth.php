<?php declare(strict_types=1);

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Services\Request;

class Auth
{
    /**
     * Залогинивание пользователя
     * @param string $name
     * @param string $password
     * @return array
     */
    public function login(string $name, string $password) : array
    {
        $time = time() + 3600;
        $query = [
            'action' => 'init',
            'platform' => 'standalone',
            'version' => '1.6797',
            'email' => $name,
            'password' => $password,
            'savePass' => 'False',
            'passHashed' => 'False',
            'expire' => $time,
            'sig' => md5(uniqid()),
        ];
        
        $url = OpenBox::get('server')."?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->run();

        if ($response['code'] == 200) {
            OpenBox::set('session', $response['cookie']['PHPSESSID']);
            return json_decode($response['body'], true);
        } else {
            return [];
        }
    }
}
