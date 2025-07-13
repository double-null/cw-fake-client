<?php

namespace CW\Services;

use Exception;
use CW\Core\OpenBox;

class Client
{
    public function __construct(?string $server = null)
    {
        OpenBox::set('server', $server ?? 'http://gw-01.contractwarsgame.com');
    }

    /**
     * Статический вызов действия
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic(string $name, array $arguments) : object
    {
        $action = ucfirst($name);
        $actionClass = "CW\\Actions\\$action";
        if (class_exists($actionClass)) {
            return new $actionClass();
        }  else {
            throw new Exception("Class $name not found");
        }
    }
}
