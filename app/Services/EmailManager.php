<?php

namespace App\Services;

class EmailManager
{

    public function check(string $checkEmail, string $currectEmail): bool
    {
        return $checkEmail == $currectEmail;
    }

    public function run()
    {
        return $this->app;
    }
}
