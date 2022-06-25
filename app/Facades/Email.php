<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method bool \Services\EmailManager\check (string $checkEmail, string $userEmail)
 */
class Email extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'email';
    }
}
