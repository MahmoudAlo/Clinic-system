<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:35',
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|min:8|string|confirmed',
            'role' => 'required|in:doctor,reception',
        ];
    }
}
