<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Service\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\info;

class UserAuthController extends Controller
{
    private $userAuthService;

    public function __construct(UserAuthService  $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }


    public function register(UserRegisterRequest $request)
    {
        $user =  $this->userAuthService->register($request->all());
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
        return response()->json($userResponse, 200);
    }
}
