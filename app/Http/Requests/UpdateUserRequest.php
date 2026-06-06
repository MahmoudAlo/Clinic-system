<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:35',
            'email' => 'sometimes|required|email|max:60',
            'password' => 'sometimes|required|min:8|string',
            'role' => 'sometimes|required|in:admin,doctor,reception',
        ];
    }
}
