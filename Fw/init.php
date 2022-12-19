<?php

use Fw\Core\Application;
use Fw\Core\Multiton;

define("ACCESS", true);

session_start();

spl_autoload_register(function ($class) {
    $prefix = 'Fw\\Core\\';
    $base_dir = __DIR__ . '\\Core\\';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . $relative_class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$application = Multiton::get(Application::class);
$pager = $application->getPager();

