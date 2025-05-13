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
        $pageTitle = 'Academic Year'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Academic Year', 'url' => route('academicYear.index')],
        ]; // Define your breadcrumb array
        return view('academicYear.index', compact('pageTitle', 'breadcrumbs'));
    })->name('academicYear.index');

    // subject : books involved 
    // in respective class/stream/section/course
    Route::get('/subject', function () {
        $pageTitle = 'Subject'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Subject', 'url' => route('subject.index')],
        ]; // Define your breadcrumb array
        return view('subject.index', compact('pageTitle', 'breadcrumbs'));
    })->name('subject.index');

    // class/stream/section/course
    Route::get('/grade', function () {
        $pageTitle = 'Grade'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Grade', 'url' => route('grade.index')],
        ]; // Define your breadcrumb array
        return view('grade.index', compact('pageTitle', 'breadcrumbs'));
    })->name('grade.index');

    // curriculum -> per day class 
    // of respective class/stream/section/course
    Route::get('/curriculum', function () {
        $pageTitle = 'Curriculum'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Curriculum', 'url' => route('curriculum.index')],
        ]; // Define your breadcrumb array
        return view('curriculum.index', compact('pageTitle', 'breadcrumbs'));
    })->name('curriculum.index');

    // teachers
    Route::get('/teacher', function () {
        $pageTitle = 'Teacher'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Teacher', 'url' => route('teacher.index')],
        ]; // Define your breadcrumb array
        return view('teacher.index', compact('pageTitle', 'breadcrumbs'));
    })->name('teacher.index');

    // students
    Route::get('/student', function () {
        $pageTitle = 'Student'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Student', 'url' => route('student.index')],
        ]; // Define your breadcrumb array
        return view('student.index', compact('pageTitle', 'breadcrumbs'));
    })->name('student.index');

    // admins
    Route::get('/admin', function () {
        $pageTitle = 'Admin'; // Define your page title
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard.admin'), 'icon' => '<i class="material-symbols-rounded text-lg position-relative">Home</i>'],
            ['name' => 'Admin', 'url' => route('admin.index')],
        ]; // Define your breadcrumb array
        return view('admin.index', compact('pageTitle', 'breadcrumbs'));
    })->name('admin.index');
});