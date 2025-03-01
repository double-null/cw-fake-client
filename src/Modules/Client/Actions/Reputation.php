<?php declare(strict_types=1);

namespace CW\Modules\Client\Actions;

use CW\Core\OpenBox;
use CW\Modules\Client\Enums\VoteCode;
use CW\Modules\Client\Services\Request;

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

        $url = $_ENV['TARGET_URL'].'?'.http_build_query($query);

        $response = Request::create()
            ->setUrl($url)
            ->setCookie(['PHPSESSID' => OpenBox::get('session')])
            ->run();

        $response = json_decode($response['body'] ?? '', true);
        $status = $response['status'] ?? false;

        $vote = new \stdClass();
        $vote->status = $status;
        $vote->quantity = ($status) ? $response['new_repa'] : 0;
        $vote->message = $response['message'] ?? '';
        $vote->code = VoteCode::from($response['result'] ?? -1);
        return $vote;
    }
}
