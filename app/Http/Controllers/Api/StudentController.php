<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;
use App\Models\AcademicYear;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Student::with(['academic_year', 'department', 'stream', 'semester', 'class', 'section'])->get();
        // print_r($records);
        return response()->json($records, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'status' => 'required|in:active,inactive',

            'academic_year_id' => [
                // 'nullable', // Parent ID is optional
                'integer', // Must be an integer
                Rule::exists('academic_years', 'id'), // Must exist in the `academic_years` table
            ],
            'department_id' => [
                // 'nullable', // Parent ID is optional
                'integer', // Parent ID must be an integer
                Rule::exists('grades', 'id'), // Parent ID must exist in the teachers table
            ],
            'stream_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'semester_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'class_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'section_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
        ]);
        // password is getting encrypted 
        $validated['password'] = Hash::make($request->password);

        $record = Student::create($validated);
        return response()->json($record, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = Student::findOrFail($id);
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'status' => 'required|in:active,inactive',

            'academic_year_id' => [
                // 'nullable', // Parent ID is optional
                'integer', // Must be an integer
                Rule::exists('academic_years', 'id'), // Must exist in the `academic_years` table
            ],
            'department_id' => [
                // 'nullable', // Parent ID is optional
                'integer', // Parent ID must be an integer
                Rule::exists('grades', 'id'), // Parent ID must exist in the teachers table
            ],
            'stream_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'semester_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'class_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
            'section_id' => [
                'nullable', // optional
                'integer', // Must be an integer
                Rule::exists('grades', 'id'), // Must exist in the `grades` table
            ],
        ]);        
        // password is getting encrypted 
        $validated['password'] = Hash::make($request->password);
        // $validated['date_of_birth'] = 'Hi I born on ' . $validated['date_of_birth'];

        $record = Student::findOrFail($id);
        $record->update($validated);
    
        return response()->json($record, 200); // 200 OK
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Student::findOrFail($id);
        $record->delete();

        return response()->json(null, 204); // 204 No Content //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function getAcademicYears()
    {
        $list = AcademicYear::select('id', 'start_date', 'end_date', 'title')
                        ->where(['status' => 'active'])
                        ->get();                 
        return response()->json($list);
    }

    public function getStreams()
    {
        $list = Grade::select('id', 'title', 'code')
                        ->where(['status' => 'active', 'type' => 'stream'])
                        ->get();                 
        return response()->json($list);
    }

    public function getDepartments()
    {
        $list = Grade::select('id', 'title', 'code')
                        ->where(['status' => 'active', 'type' => 'department'])
                        ->get();                 
        return response()->json($list);
    }

    public function getSemesters()
    {
        $list = Grade::select('id', 'title', 'code')
                        ->where(['status' => 'active', 'type' => 'semester'])
                        ->get();                 
        return response()->json($list);
    }

    public function getSections()
    {
        $list = Grade::select('id', 'title', 'code')
                        ->where(['status' => 'active', 'type' => 'section'])
                        ->get();                 
        return response()->json($list);
    }

    public function getClasses()
    {
        $list = Grade::select('id', 'title', 'code')
                        ->where(['status' => 'active', 'type' => 'class'])
                        ->get();                 
        return response()->json($list);
    }
}
