<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AcademicYearController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CurriculumController;
use App\Http\Controllers\Api\AdminController;

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
Route::get('grades/parents', [GradeController::class, 'getParentGrades']);//->name('getParentGradesForGrade');
Route::apiResource('teacher', TeacherController::class);
Route::apiResource('student', StudentController::class);
Route::get('students/academic-years', [StudentController::class, 'getAcademicYears'])->name('getAcademicYearsForStudent');
Route::get('students/streams', [StudentController::class, 'getStreams'])->name('getStreamsForStudent');
Route::get('students/departments', [StudentController::class, 'getDepartments'])->name('getDepartmentsForStudent');
Route::get('students/semesters', [StudentController::class, 'getSemesters'])->name('getSemestersForStudent');
Route::get('students/sections', [StudentController::class, 'getSections'])->name('getSectionsForStudent');
Route::get('students/classes', [StudentController::class, 'getClasses'])->name('getClassesForStudent');

Route::apiResource('curriculum', CurriculumController::class);
Route::get('curriculums/teachers', [CurriculumController::class, 'getTeachers'])->name('getTeachersForCurriculum');
Route::get('curriculums/subjects', [CurriculumController::class, 'getSubjects'])->name('getSubjectsForCurriculum');
Route::get('curriculums/academic-years', [CurriculumController::class, 'getAcademicYears'])->name('getAcademicYearsForCurriculum');
Route::get('curriculums/streams', [CurriculumController::class, 'getStreams'])->name('getStreamsForCurriculum');
Route::get('curriculums/departments', [CurriculumController::class, 'getDepartments'])->name('getDepartmentsForCurriculum');
Route::get('curriculums/semesters', [CurriculumController::class, 'getSemesters'])->name('getSemestersForCurriculum');
Route::get('curriculums/sections', [CurriculumController::class, 'getSections'])->name('getSectionsForCurriculum');
Route::get('curriculums/classes', [CurriculumController::class, 'getClasses'])->name('getClassesForCurriculum');
Route::apiResource('admin', AdminController::class);
