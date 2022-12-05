<?php

namespace Fw\Core;

class Config
{
    private $config;
    private const ERROR_CONFIG = 'Config value not found';

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';
        $this->config = $config;
    }

    public function getValue(string $path)
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
