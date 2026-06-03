<?php

namespace App\Observers;
use \App\Models\Doctor;
use \App\Models\User;
class UserObserver
{
    public function created(User $user): void
    {
        if ($user->role === 'doctor') {

            Doctor::create([
                'user_id' => $user->id,
                'specialty' => null,
                'experience_years' => 0,
            ]);

        }
    }
}
