<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation;

use Illuminate\Contracts\Validation\Rule;

class TwitterHandleRule implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->twitterHandleValidator->validate($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The :attribute can only contain letters, numbers and ' _ '. Min 5 and max 15 characters.";
    }
}
