<?php

namespace App\Repository;

use App\Models\User;

class UserAuthRepository
{

    public function register($data)
    {
        return User::create($data);
    }

    public function findByEmail($email)
    {
        return User::where("email", $email)->first();
    }
}
