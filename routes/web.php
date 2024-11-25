<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/academic-year', function () {
    return view('acedemicYear.index');
})->name('academicYear.index');

Route::get('/subject', function () {
    return view('subject.index');
})->name('subject.index');


Route::get('/grade', function () {
    return view('grade.index');
})->name('grade.index');



