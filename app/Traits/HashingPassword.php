<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HashingPassword
{
    /**
     * Get the hashed password.
     *
     * @return string
     */
    public function hashPassword($password)
    {
        return Hash::make($password);
    }
}
