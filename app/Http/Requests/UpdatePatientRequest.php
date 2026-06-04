<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'name'=>'sometimes|required|string|max:50',
            'birth_date'=>'sometimes|date|required|formte',
            'gender'=>'sometimes|required|in:male,female',
            'phone'=>'sometimes|required|string|max:10',
            
        ];
    }
}
