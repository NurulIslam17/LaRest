<?php

namespace App\Service;

use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Repository\AdminAuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\info;

class AdminAuthService
{

    private $adminAuthRepository;

    public function __construct(AdminAuthRepository $adminAuthRepository)
    {
        $this->adminAuthRepository = $adminAuthRepository;
    }

    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->adminAuthRepository->register($data);
    }

    public function login($data)
    {
        $admin = Admin::where('email', $data['email'])->first();

        if (! $admin || ! Hash::check($data['password'], $admin->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $admin->createToken('admin-token')->plainTextToken;
        return [
            "admin" => new AdminResource($admin),
            "token" => $token
        ];
    }
}
