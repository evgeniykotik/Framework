<?php

namespace Fw\Core\Validation\Validators;

class Phone extends RegExp
{
    const TELEPHONE = "/^(\s*)?([+-]?\d){8,20}(\s*)?$/";

    public function __contruct($rule)
    {
        $this->rule = self::TELEPHONE;
    }
}