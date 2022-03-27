<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class elerhetoseg implements Rule
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
        return preg_match('/^\+?36\d{9}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Az elérhetőség (telefonszám) formátuma nem megfelelő.';
    }
}
