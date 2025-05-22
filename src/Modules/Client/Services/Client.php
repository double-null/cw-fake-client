<?php

namespace CW\Modules\Client\Services;

use Exception;

class Client
{
    /**
     * Инициализация действия
     * @param string $action
     * @return mixed
     */
    public static function makeAction(string $action) : object
    {
        $actionClass = "CW\\Modules\\Client\\Actions\\$action";
        return new $actionClass();
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
        $actionClass = "CW\\Modules\\Client\\Actions\\$action";
        if (class_exists($actionClass)) {
            return new $actionClass();
        }  else {
            throw new Exception("Class $name not found");
        }
    }
}
