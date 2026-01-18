<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\info;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view('employee.index',compact('employees'));
    }


    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender'        => 'required',
            'address'       => 'required|string',
            'skills'        => 'nullable|string',
            'basic_salary'  => 'required|numeric|min:0',
        ]);

        Employee::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Employee created successfully'
        ]);
    }
}
