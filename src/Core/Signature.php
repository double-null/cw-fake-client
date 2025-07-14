<?php declare(strict_types=1);

namespace CW\Core;

class Signature
{
    private string $sharedSecret = '';

    private string $queryString = '';

    public function generate() : string
    {
        $key = $this->sharedSecret.$this->queryString;
        $signature = mb_convert_encoding($key, 'UTF-8');
        return md5($signature);
    }

    public static function create() : self
    {
        return new self();
    }

    public function setSharedSecret($secret) : self
    {
        $this->sharedSecret = $secret;
        return $this;
    }

    public function setQueryString(string $queryString) : self
    {
        $this->queryString = $queryString;
        return $this;
    }
}
