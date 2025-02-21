<?php

namespace CW\Modules\Client\Services;

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
}
