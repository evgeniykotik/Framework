<?php

namespace Fw\Core;

class Multiton
{
    private static $instanceArray = array();

    private function __construct()
    {

    }

    public static function get($className)
    {
        if (!isset(self::$instanceArray[$className])) {
            self::$instanceArray[$className] = new $className();
        }
        return self::$instanceArray[$className];
    }
}
