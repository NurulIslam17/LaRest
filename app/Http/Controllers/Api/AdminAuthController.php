<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Resources\AdminResource;
use App\Service\AdminAuthService;
use Illuminate\Http\Request;

use function Laravel\Prompts\info;

class AdminAuthController extends Controller
{
    private $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }

    public function register(AdminRegisterRequest $request)
    {
        $user =  $this->adminAuthService->register($request->all());
        $token = $user->createToken('user-token')->plainTextToken;
        return response()->json([
            'admin' => new AdminResource($user),
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $adminResponse =  $this->adminAuthService->login($request->all());
        return response()->json($adminResponse, 201);
    }
}
