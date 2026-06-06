<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {
        $records = Record::all();
        return response()->json($records);

    }


    public function store(StoreRecordRequest $request)
    {
        $validatedData = $request->validated();
        $record = Record::create($validatedData);
        return request()->json($record);

    }


    public function show(string $id)
    {
        $record = Record::findOrFail($id);
        return response()->json($record);
    }

    public function update(UpdateRecordRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $record = Record::findOrFail($id);
        $record->update($validatedData);
        return response()->json($record);
    }


    public function destroy(string $id)
    {
        $record = Record::findOrFail($id);
        $record->delete();
        return response()->json('Deleted Successflly');
    }
}
