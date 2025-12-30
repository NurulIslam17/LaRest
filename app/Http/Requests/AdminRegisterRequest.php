<?php

namespace App\Http\Requests;

use Dotenv\Validator as DotenvValidator;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            'email' => "required|string|email|unique:admins",
            'photo' => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            'password' => "required|string|min:4",
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => "This email already exists as an admin.",
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
