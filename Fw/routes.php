<?php

if (!defined("ACCESS")) {
    die("Доступ закрыт");
}

$routes = [
    [
        'condition' => '#^/news/([0-9]+)/([0-9]+)/#',

        'rule' => 'sid=$1&id=$2',

        'path' => "/news/index.php"

    ]
];

