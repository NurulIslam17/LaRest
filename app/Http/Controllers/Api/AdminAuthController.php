<?php

namespace App\Http\Controllers\Api;

use AdminAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $admminAuthService;

    public function __connstruct(AdminAuthService $adminAuthService)
    {
        $this->admminAuthService = $adminAuthService;

    }
}
