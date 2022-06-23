<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Services\Email\Check ($checkEmail, $userEmail)
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
