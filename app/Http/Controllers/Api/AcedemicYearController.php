<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcedemicYear;

class AcedemicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = AcedemicYear::all();
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'title' => 'required|string|max:250',
            'status' => 'required|in:active,inactive',
        ]);

        $record = AcedemicYear::create($validated);
        return response()->json($record, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = AcedemicYear::findOrFail($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'start_date' => 'date',
            'end_date' => 'date',
            'title' => 'string|max:250',
            'status' => 'required|in:active,inactive', 
        ]);

        $record = AcedemicYear::findOrFail($id);
        $record->update($validated);

        return response()->json($record, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = AcedemicYear::findOrFail($id);
        $record->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
