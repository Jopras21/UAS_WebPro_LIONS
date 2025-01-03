<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@student\.umn\.ac\.id$/'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'email.regex' => 'The email must belong to the domain @student.umn.ac.id.',
        ];
    }

    /**
     * Attempt to authenticate the user.
     */
    public function authenticate()
    {
        $credentials = $this->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
}