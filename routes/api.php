<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AcademicYearController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CurriculumController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('academic-year', AcademicYearController::class);
Route::apiResource('subject', SubjectController::class);
Route::apiResource('grade', GradeController::class);
Route::get('grades/parents', [GradeController::class, 'getParentGrades']);
Route::apiResource('teacher', TeacherController::class);
Route::apiResource('student', StudentController::class);
Route::apiResource('curriculum', CurriculumController::class);