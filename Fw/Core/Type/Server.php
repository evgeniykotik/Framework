<?php

namespace Fw\Core\Type;

class Server extends Dictionary
{
    public function __construct()
    {
        parent::__construct($_SERVER, $readonly = true);
    }
}
