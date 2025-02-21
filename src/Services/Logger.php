<?php

namespace CW\Services;

class Logger
{
    /**
     * Логирование
     * @param string $message
     * @param string $filename
     * @return void
     */
    public static function log(string $message, string $filename) : void
    {
        $logDirectory = __DIR__ . "/../../logs/";

        if (!is_dir($logDirectory)) {
            mkdir($logDirectory, 0777, true);
        }

        $filepath = $logDirectory . $filename . '_'.date('d.m.Y').'.log';
        $content = date('[d.m.Y H:i:s] ').$message.PHP_EOL;
        file_put_contents($filepath, $content, FILE_APPEND);
    }
}
