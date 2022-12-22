<?php

namespace Fw\Core\Type;

class Session extends Dictionary
{
    public function __construct()
    {
        parent::__construct($_SESSION, $readonly = false);
    }
}
