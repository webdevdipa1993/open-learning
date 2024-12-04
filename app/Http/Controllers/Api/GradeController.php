<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Grade::with('parent')->get();
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'code' => 'required|string|max:50|unique:grades,code',
            'type' => 'required|string|in:stream,semester,class,section,department', // Restrict type to specific values
            'status' => 'required|in:active,inactive',
            'parent_id' => [
                'nullable', // Parent ID is optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
        ]);
    
        $record = Grade::create($validated);
        return response()->json($record, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Grade::findOrFail($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250', // Title is required, max length 250
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('grades', 'code')->ignore($id), // Ensure unique code, ignore current grade ID on update
            ],
            'type' => 'required|string|in:stream,semester,class,section,department', // Type must be one of the specified values
            'status' => 'required|in:active,inactive', // Status must be active or inactive
            'parent_id' => [
                'nullable', // Parent ID is optional
                'integer', // Parent ID must be an integer
                Rule::exists('grades', 'id'), // Parent ID must exist in the grades table
            ],
        ]);        
        $record = Grade::findOrFail($id);
        $record->update($validated);
        
        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Grade::findOrFail($id);
        $record->delete();

        return response()->json(null, 204); // 204 No Content //
    }

    public function getParentGrades()
    {
        $grades = Grade::select('id', 'title', 'code', 'type')->get();
        return response()->json($grades);
    }
}
