<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class Chain extends Validator
{
    function validate($value): bool
    {
        $result = false;
        foreach ($this->rule as $validator) {
            if (!($validator instanceof Validator)) {
                continue;
            }
            if (!$result = $validator->validate($value)) {
                break;
            }
        }
        return $result;
    }
}
