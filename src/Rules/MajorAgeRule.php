<?php

namespace Agenciafmd\Admix\Utils\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class MajorAgeRule implements Rule
{
    /**
     * @var string $dateFormat Formato da data.
     */
    private $dateFormat;

    public function __construct(string $dateFormat = 'd/m/Y')
    {
        $this->dateFormat = $dateFormat;
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
        $date = Carbon::createFromFormat($this->dateFormat, $value);

        return $date->diffInYears() >= 18;
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return trans('agenciafmd/utils::validation.major_age');
    }
}
