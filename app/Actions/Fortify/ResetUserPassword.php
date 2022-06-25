<?php

namespace App\Actions\Fortify;

use App\Traits\HashingPassword;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules, HashingPassword;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  string  $password
     * @return void
     */
    public function reset($user, string $password)
    {
        $user->update([
            'password' => $this->hashPassword($password),
        ]);
    }
}
