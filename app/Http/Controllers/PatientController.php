<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorPatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return $patients;
    }


    public function store(StorPatientRequest $request)
    {
        $patient = Patient::create($request->validated());
        return response()->json($patient);
    }


    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);

    }


    public function update(UpdatePatientRequest $request, string $id)
    {
        $valdatedData = $request->validated();
        $patient = Patient::findOrFail($id);
        $patient->update($valdatedData);
        return response()->json($patient);

    }

    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json('deleted successfly');

    }
}
