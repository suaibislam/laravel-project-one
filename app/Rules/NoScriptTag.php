<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoScriptTag implements Rule
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
        // Disallow <script> tags
        return !preg_match('/<script.*?>.*?<\/script>/is', $value);
    }

    public function message()
    {
        return 'The :attribute field contains disallowed script tags.';
    }
}
