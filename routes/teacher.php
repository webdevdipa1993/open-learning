<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\Auth\AdminAuthController;


/*
|--------------------------------------------------------------------------
| teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// teacher's route
// Route::group(/*['prefix' => 'teacher', 'middleware' => ['auth.teacher']],*/ function () {
    Route::get('/dashboard', function () {
        return view('dashboard.teacher');
    })->name('dashboard.teacher'); 
    
      
// });