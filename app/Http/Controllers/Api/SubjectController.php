<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Subject::all();
        return response()->json($records, 200); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'code' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'status' => 'required|in:active,inactive',
        ]);
    
        $record = Subject::create($validated);
        return response()->json($record, 201); // 201 Created
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Subject::findOrFail($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'code' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'status' => 'required|in:active,inactive', 
        ]);

        $record = Subject::findOrFail($id);
        $record->update($validated);

        return response()->json($record, 200); // 200 OK
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Subject::findOrFail($id);
        $record->delete();

        return response()->json(null, 204); // 204 No Content //
    }
}
