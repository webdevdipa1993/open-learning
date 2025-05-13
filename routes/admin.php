<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ===============================================================================================
// admin's route
Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin'); 
});

Route::group(['prefix' => 'admin/entry-master', 'middleware' => ['auth.admin']], function () {
    // associated year 
    Route::get('/academic-year', function () {
        return view('academicYear.index');
    })->name('academicYear.index');

    // subject : books involved 
    // in respective class/stream/section/course
    Route::get('/subject', function () {
        return view('subject.index');
    })->name('subject.index');

    // class/stream/section/course
    Route::get('/grade', function () {
        return view('grade.index');
    })->name('grade.index');

    // curriculum -> per day class 
    // of respective class/stream/section/course
    Route::get('/curriculum', function () {
        return view('curriculum.index');
    })->name('curriculum.index');

    // teachers
    Route::get('/teacher', function () {
        return view('teacher.index');
    })->name('teacher.index');

    // students
    Route::get('/student', function () {
        return view('student.index');
    })->name('student.index');

    // admins
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');
});