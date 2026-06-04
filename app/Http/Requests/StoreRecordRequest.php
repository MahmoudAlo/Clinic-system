<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'patient_id'=>'required|exist:patients,id',
            'doctor_id'=>'required|exist:doctors,id',
            'diagnosis'=>'required|string',
            'treatment'=>'required|string',
            'notes'=>'nullable|string'
        ];
    }
}
