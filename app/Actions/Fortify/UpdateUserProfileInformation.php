<?php

namespace App\Actions\Fortify;

use App\Facades\Email;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        if (
            !Email::check($input['email'], $user->email) &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user
                ->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                ])
                ->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ]);
        
        $user->sendEmailVerificationNotification();
    }
}
