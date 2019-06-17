<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation;

class LaravelTwitterHandleValidation
{
    /**
     * @var TwitterHandleValidator
     */
    protected $twitterHandleValidator;

    /**
     * @param TwitterHandleValidator $twitterHandleValidator
     */
    public function __construct(TwitterHandleValidator $twitterHandleValidator)
    {
        $this->twitterHandleValidator = $twitterHandleValidator;
    }

    /**
     * @param String $value
     * @return boolean
     */
    public function isValid($value): bool
    {
        return $this->twitterHandleValidator->validate(null, $value);
    }
}
