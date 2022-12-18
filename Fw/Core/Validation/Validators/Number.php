<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class Number extends Validator
{
    public function validate($value): bool
    {
        return is_integer($value);
    }
}