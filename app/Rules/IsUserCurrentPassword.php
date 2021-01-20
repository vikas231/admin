<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;

class IsUserCurrentPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
     public function __construct($password, $user_id)
    {
        $this->password = $password;
        $this->user_id = $user_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value){
        $current_password = User::where('id', $this->user_id)->value('password');
        return Hash::check($value, $current_password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The current password is incorrect.';
    }
}
