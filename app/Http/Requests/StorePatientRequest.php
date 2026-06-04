<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorPatientRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>'required|string|max:50',
            'birth_date'=>'date|required|formte',
            'gender'=>'required|in:male,female',
            'phone'=>'required|string|max:10'
        ];
    }
}
