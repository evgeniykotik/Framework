<?php

namespace Fw\Core\Validation\Validators;

class Email extends RegExp
{
    public function __construct()
    {
        $this->rule = FILTER_VALIDATE_EMAIL;
    }
}