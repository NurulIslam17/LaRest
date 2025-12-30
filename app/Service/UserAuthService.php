<?php

namespace App\Service;

use App\Http\Resources\UserResource;
use App\Repository\UserAuthRepository;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{

    private $userAuthRepository;
    public function __construct(UserAuthRepository $userAuthRepository)
    {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function register($data)
    {
        $data["password"] = bcrypt($data["password"]);
        return $this->userAuthRepository->register($data);
    }

    public function login($data)
    {
        $user = $this->userAuthRepository->findByEmail($data["email"]);
        if (!$user || !Hash::check($data["password"], $user->password)) {
            $userResponse = [
                "message" => "Invalid user credentials"
            ];
            return response()->json($userResponse, 401);
        }
        $token = $user->createToken("auth-token")->plainTextToken;
        return [
            "user" => new UserResource($user),
            "token" => $token
        ];
    }
}
