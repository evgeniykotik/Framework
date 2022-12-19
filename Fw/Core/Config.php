<?php

namespace Fw\Core;

class Config
{
    private static $config = null;
    private const ERROR_CONFIG = 'Config value not found';

    public static function getValue(string $path)
    {
        if (self::$config === null) {
            require_once __DIR__ . '/../config.php';
            self::$config = $config;
        }
        $path = explode('/', $path);
        $count = count($path);
        $tempValue = self::$config;
        for ($i = 0; $i < $count; $i++) {
            if (!is_array($tempValue)) {
                return self::ERROR_CONFIG;
            }
            $tempValue = $tempValue[$path[$i]];
        }
        return $tempValue;
    }
}
