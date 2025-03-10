<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Admin::all();
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'employee_code' => 'required|string|max:50|unique:admins,employee_code',
            'specialization' => 'required|string|max:250',
            'status' => 'required|in:active,inactive',
        ]);
    
        $record = Admin::create($validated);
        return response()->json($record, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Admin::findOrFail($id);
        return response()->json($record, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            // 'employee_code' => 'required|string|max:50|unique:admins,employee_code',
            'employee_code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('admins', 'employee_code')->ignore($id),
            ],
            'specialization' => 'required|string|max:250',
            'status' => 'required|in:active,inactive',
        ]);
        
        $record = Admin::findOrFail($id);
        $record->update($validated);
    
        return response()->json($record, 200); // 200 OK
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Admin::findOrFail($id);
        $record->delete();

        return response()->json(null, 204); // 204 No Content //
    }
}
