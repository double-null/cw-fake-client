<?php declare(strict_types=1);

namespace CW\Modules\Client\Services;

class Request
{
    private string $url;

    private mixed $params;

    private ?array $cookie;

    public function run() : mixed
    {
        $ch = curl_init();

        $cookieString = (!empty($this->cookie)) ? http_build_query($this->cookie) : '';

        $options = [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
            ],
            CURLOPT_COOKIE => $cookieString,
        ];

        if (!empty($this->params)) {
            $options[CURLOPT_POSTFIELDS] = $this->params;
        }

        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $response, $matches);
        $cookies = [];
        foreach($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }

        return [
            'code' => $responseCode,
            'header' => substr($response, 0, $headerSize),
            'body' => substr($response, $headerSize),
            'cookie' => $cookies,
        ];
    }

    public static function create() : self
    {
        return new self();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Request
    {
        $this->url = $url;
        return $this;
    }

    public function getParams(): mixed
    {
        return $this->params;
    }

    public function setParams(mixed $params): Request
    {
        $this->params = $params;
        return $this;
    }

    public function getCookie(): ?array
    {
        return $this->cookie;
    }

    public function setCookie(?array $cookie): Request
    {
        $this->cookie = $cookie;
        return $this;
    }
}
