<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('student.index');
});

//Subject Routes

Route::get('/',[SubjectController::class,'index'])->name('subject');
Route::get('/subject-create',[SubjectController::class,'create'])->name('subject.create');
Route::post('/subject-store',[SubjectController::class,'store'])->name('subject.store');
Route::get('/subject-edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
Route::put('/subject-update/{id}',[SubjectController::class,'update'])->name('subject.update');
Route::get('/subject-delete/{id}',[SubjectController::class,'destroy'])->name('subject.del');

//Subject

Route::get('/sclass',[SchoolClassController::class,'index'])->name('sclass');
Route::get('/sclass-create',[SchoolClassController::class,'create'])->name('class.create');
Route::post('/sclass-store',[SchoolClassController::class,'store'])->name('class.store');
Route::get('/sclass-edit/{id}',[SchoolClassController::class,'edit'])->name('class.edit');
Route::put('/sclass-update/{id}',[SchoolClassController::class,'update'])->name('class.update');
Route::get('/sclass-delete/{id}',[SchoolClassController::class,'destroy'])->name('class.del');

//Student

Route::get('/student',[StudentController::class,'index'])->name('student');
Route::get('/student-create',[StudentController::class,'create'])->name('student.create');
Route::post('/student-store',[StudentController::class,'store'])->name('student.store');
Route::get('/student-edit/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/student-update/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/student-del/{id}',[StudentController::class,'destroy'])->name('student.del');
