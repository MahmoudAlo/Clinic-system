<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
 
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'start'=>'sometimes|date|required',
            'end'=>'date|nullable',
            'status'=>'sometimes|required|in:pending,confirmed,completed,cancelled'
        ];
    }
}
