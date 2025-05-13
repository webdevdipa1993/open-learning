<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// student's route
// Route::group(/*['prefix' => 'student', 'middleware' => ['auth.student']],*/ function () {
    Route::get('/dashboard', function () {
        return view('dashboard.student');
    })->name('dashboard.student'); 
    
    Route::get('/admission', function () {
        $pageTitle = 'Admission Form'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.student'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Admission', 'url' => route('student.admission')],
        ]; // Define your breadcrumb array

        return view('admission.index', compact('pageTitle', 'breadcrumbs'));
    })->name('student.admission');
    
    Route::get('/classes', function () {
        return view('classes.index');
    })->name('student.classes');

    Route::get('/assignments', function () {
        return view('assignments.index');
    })->name('student.assignments');

    Route::get('/exams', function () {
        return view('exams.index');
    })->name('student.exams');

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('student.profile');

    Route::get('/documents', function () {
        return view('documents.index');
    })->name('student.documents');

    Route::get('/payments', function () {
        return view('payments.index');
    })->name('student.payments');

    Route::get('/reports', function () {
        return view('reports.index');
    })->name('student.reports');

    Route::get('/support', function () {
        return view('support.index');
    })->name('student.support');

    Route::get('/resources', function () {
        return view('resources.index');
    })->name('student.resources');
// });