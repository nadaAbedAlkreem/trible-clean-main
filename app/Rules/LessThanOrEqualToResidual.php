<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LessThanOrEqualToResidual implements Rule
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
        return $value <= $this->remaining;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The residual cannot be greater than the amount.';
    }
}
