<?php

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Core\Request;

/**
 * Взаимодействия с рулеткой
 */
class Roulette
{
    /**
     * Запуск прокручивания рулетки
     * @return mixed награда выпавшая при прокрутке
     */
    public function roll() : mixed
    {
        $time = time() + 3600;
        $query = [
            'action' => 'spinRoulette',
            'expire' => $time,
            'sig' => md5(uniqid(rand(), true)),
        ];

        $url = OpenBox::get('server')."?".http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        $data = json_decode($response['body'], true);

        if (!empty($data) && $data['result'] === 0) {
            return $data['index'];
        }

        return false;
    }
}
