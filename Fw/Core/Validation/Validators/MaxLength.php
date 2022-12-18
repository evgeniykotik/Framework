<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class Length extends Validator
{
    public function validate($value, $max = true): bool
    {
        if (is_integer($value) || is_string($value)) {
            $size = strlen("" . $value);
        }
        if (is_array($value)) {
            $size = count($value);
        }
        return $max ? $size <= $this->rule : $size >= $this->rule;
    }
}

$max = new Length(3);
var_dump($max->validate(4));