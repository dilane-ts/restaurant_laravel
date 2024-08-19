<?php

namespace App\Actions\User;

use App\Models\User;
use App\Notifications\UserRegistrationNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreUserAction
{
    public function __invoke(string $email, string $name)
    {
        $password = Str::random(8);
        $user = User::create([
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password)
        ]);

        $user->notify(new UserRegistrationNotification($user, $password));
        return $user;
    }
}
