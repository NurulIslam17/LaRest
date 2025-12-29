<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserAuthService;

class UserAuthController extends Controller
{
    private $userAuthService;

    public function __connstruct(UserAuthService  $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }
}
