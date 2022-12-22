<?php

namespace Fw\Core\Type;

class Request extends Dictionary
{
    public function __construct()
    {
        parent::__construct($_REQUEST, $readonly = true);
    }
}