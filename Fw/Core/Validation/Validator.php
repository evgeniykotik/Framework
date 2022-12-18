<?php

namespace Fw\Core\Validation;

abstract class Validator
{
    protected $rule = null;

    public function __contruct($rule)
    {
        $this->rule = $rule;
    }

    abstract public function validate($value): bool;
}