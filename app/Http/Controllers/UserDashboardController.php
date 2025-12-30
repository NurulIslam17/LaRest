<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function profile(Request $request)
    {
        return response()->json([
            "message" => "User Profile",
            "user" => auth()->user()
        ], 200);
    }
}
