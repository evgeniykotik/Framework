<?php

namespace Fw\Core;

class Application
{
    private $pager = null;
    private static $instance = null;
    private $template = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
