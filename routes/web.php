<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'entry-master'], function () {
    Route::get('/academic-year', function () {
        return view('academicYear.index');
    })->name('academicYear.index');

    Route::get('/subject', function () {
        return view('subject.index');
    })->name('subject.index');

    Route::get('/grade', function () {
        return view('grade.index');
    })->name('grade.index');

    Route::get('/teacher', function () {
        return view('teacher.index');
    })->name('teacher.index');

    Route::get('/student', function () {
        return view('student.index');
    })->name('student.index');

    Route::get('/curriculum', function () {
        return view('curriculum.index');
    })->name('curriculum.index');
});

Route::group(['prefix' => 'auth'], function () {    
    // Route :: student
    Route::get('/student/login', function () {
        return view('auth.student.login');
    })->name('auth.student.login'); 
    Route::post('/student/login', [StudentAuthController::class, 'login'])->name('auth.student.login');

    Route::get('/student/logout', [StudentAuthController::class, 'logout'])
        ->name('auth.student.logout')
        ->middleware('auth.student');
    Route::post('/student/logout', [StudentAuthController::class, 'logout'])
        ->name('auth.student.logout')
        ->middleware('auth.student');

    //  Route :: teacher
     Route::get('/teacher/login', function () {
         return view('auth.teacher.login');
     })->name('auth.teacher.login'); 
     Route::post('/teacher/login', [TeacherAuthController::class, 'login'])->name('auth.teacher.login');

     Route::get('/teacher/logout', [TeacherAuthController::class, 'logout'])
         ->name('auth.teacher.logout')
         ->middleware('auth.teacher');
     Route::post('/student/logout', [TeacherAuthController::class, 'logout'])
         ->name('auth.teacher.logout')
         ->middleware('auth.teacher');
});
Route::group(['prefix' => 'dashboard'], function () {
    // Route :: student
    Route::get('/student', function () {
        return view('dashboard.student');
    })->name('dashboard.student')->middleware('auth.student'); 
    
     // Route :: teacher
     Route::get('/teacher', function () {
         return view('dashboard.teacher');
     })->name('dashboard.teacher')->middleware('auth.teacher'); 
});
