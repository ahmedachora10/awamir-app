<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Text implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return preg_match("/^[\pL\s\(\)\[\]\{\}\-_0-9]+$/u", $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'النص يجب ان يحتوي على نصوص وارقام و واقواس';
    }
}
