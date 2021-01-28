<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class scale_calibration_rule implements Rule
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
        //

             //return $value == 100.0;
        return $value >= 99.9 && $value <= 100.1;
       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Calibration out of range, please re-check';
    }
}
