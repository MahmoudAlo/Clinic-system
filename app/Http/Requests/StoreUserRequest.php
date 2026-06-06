<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:35',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|string',
            'role' => 'required|in:admin,doctor,reception',
        ];
    }
}
