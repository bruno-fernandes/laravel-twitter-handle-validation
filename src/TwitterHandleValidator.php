<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation;

class TwitterHandleValidator
{
    /**
     * Valiate twitter handle
     *
     * @param [type] $attribute
     * @param [type] $value
     * @return bool
     */
    public function validate($attribute, $value) : bool
    {
        return preg_match('/^(\@)?([a-z0-9_]{5,15})$/i', $value);
    }
}
