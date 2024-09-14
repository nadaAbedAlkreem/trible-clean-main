<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ResidualEqualToZero implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($remaining)
    {
        $this->remaining = $remaining;
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

        return $this->remaining != 0 || $value == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Payment is not allowed when the remaining amount is zero.';
    }
}
