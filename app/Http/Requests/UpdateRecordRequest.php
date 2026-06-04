<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(): array
    {
        return [
            'diagnosis' => 'sometimes|required|string',
            'treatment' => 'sometimes|required|string',
            'notes' => 'nullable|string'
        ];
    }
}
