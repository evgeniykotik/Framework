<?php


namespace Fw\Core;

class Config
{
    private $config;
    private const ERROR_CONFIG = 'Config value not found';
    private static $instance = null;

    private function __construct()
    {
        require_once '../config.php';
        $this->config = $config;
    }

    public static function getValue(string $path)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance->getValueInner($path);
    }

    private function getValueInner(string $path)
    {
        $path = explode('/', $path);
        $count = count($path);
        $tempValue = $this->config;
        for ($i = 0; $i < $count; $i++) {
            if (!is_array($tempValue)) {
                return self::ERROR_CONFIG;
            }
            $tempValue = $tempValue[$path[$i]];
        }
        return $tempValue;
    }
}

print_r(Config::getValue('db/login'));

