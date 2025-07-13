<?php declare(strict_types=1);

namespace CW\Actions;

use CW\Core\OpenBox;
use CW\Enums\VoteCode;
use CW\Services\Request;

class Reputation
{
    /**
     * @param int $userId ID пользователя
     * @return object
     */
    public function vote(int $userId) : object
    {
        $time = time() + 3600;
        $query = [
            'action' => 'vote',
            'pos' => '8',
            'vote' => 1,
            'votefor' => $userId,
            'expire' => $time,
            'sig' => md5(uniqid()),
        ];

        $url = OpenBox::get('server').'?'.http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        $response = json_decode($response['body'] ?? '', true);

        $vote = new \stdClass();
        $vote->status = $response['data'] ?? false;
        $vote->quantity = $response['new_repa'] ?? 0;
        $vote->message = $response['message'] ?? '';
        $vote->code = VoteCode::from($response['result'] ?? -1);
        return $vote;
    }
}
