<?php

namespace App\Repository;
use App\Models\Admin;

class AdminAuthRepository
{
    public function register($data)
    {
        return Admin::create($data);
    }

}
