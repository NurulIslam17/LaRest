<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Service\UserAuthService;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    private $userAuthService;

    public function __construct(UserAuthService  $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function register(Request $request)
    { 
        // TODO: Make Request for validation
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email|unique:users",
            "password" => "required|string|min:4"
        ]);
        $user =  $this->userAuthService->register($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => "required|string|email",
            "password" => "required|string|min:4"
        ]);
        $userResponse =  $this->userAuthService->login($data);
        return response()->json($userResponse,200);
    }
}
