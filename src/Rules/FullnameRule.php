<?php

namespace Agenciafmd\Admix\Utils\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class FullnameRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Str::isFullname($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return "O :attribute parece não estar completo";
    }
}
