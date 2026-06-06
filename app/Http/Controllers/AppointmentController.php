<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointmet = Appointment::all();
        return response()->json($appointmet);
    }

 
    public function store(StoreAppointmentRequest $request)
    {   
        $validatedData = $request->validated();
        Appointment::create($validatedData);
        return response()->json('Created Successfully');
    }

  
    public function show(string $id)
    {   
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }

 
    public function update(UpdateAppointmentRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);
        return response()->json($appointment);
    }

  
    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json('Deleted Succssfully');
    }
}
