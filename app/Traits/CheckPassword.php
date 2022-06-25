<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait CheckPassword
{
    /**
     * Check password.
     *
     * @return bool
     */
    public function checkPassword(
        string $checkPassword,
        string $curectPassword
    ): bool {
        return Hash::check($checkPassword, $curectPassword);
    }
}
