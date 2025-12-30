<?php

namespace App\Service;

use App\Http\Resources\UserResource;
use App\Repository\UserAuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserAuthService
{

    private $userAuthRepository;
    public function __construct(UserAuthRepository $userAuthRepository)
    {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function register($data)
    {
        if (isset($data['photo'])) {
            $url = storeImage($data['photo'], 'photos');
            $data["photo"] = $url;
        }
        $data["password"] = bcrypt($data["password"]);
        $user =  $this->userAuthRepository->register($data);
        return $user;
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
