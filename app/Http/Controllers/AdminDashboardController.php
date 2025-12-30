<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return response()->json([
            "message" => "Welocme to Admin Dashboard",
            'admin' => auth('admin')->user(),
        ], 200);
    }
}
