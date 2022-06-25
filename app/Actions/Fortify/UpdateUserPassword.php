<?php

namespace App\Actions\Fortify;

use App\Traits\HashingPassword;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use HashingPassword;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  string  $password
     * @return void
     */
    public function update($user, string $password)
    {
        $user->update([
            'password' => $this->hashPassword($password),
        ]);
    }
}
