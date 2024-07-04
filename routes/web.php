<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/student', [StudentController::class, 'index'])->name('student');

Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student.show');

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::post('/student/create', [StudentController::class, 'save'])->name('student.save');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');



//Crube operation of teacher


Route::get('/teacher', [StudentController::class, 'index'])->name('teacher');

Route::get('/teacher/show/{id}', [StudentController::class, 'show'])->name('teacher.show');

Route::get('/teacher/create', [StudentController::class, 'create'])->name('teacher.create');
Route::get('/teacher/delete/{id}', [StudentController::class, 'delete'])->name('teacher.delete');
Route::post('/teacher/create', [StudentController::class, 'save'])->name('student.save');
Route::get('/teacher/edit/{id}', [StudentController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [StudentController::class, 'update'])->name('teacher.update');


//Crube operation of course
Route::get('/course', [StudentController::class, 'index'])->name('course');

Route::get('/course/show/{id}', [StudentController::class, 'show'])->name('course.show');

Route::get('/course/create', [StudentController::class, 'create'])->name('course.create');
Route::get('/course/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::post('/student/create', [StudentController::class, 'save'])->name('course.save');
Route::get('/course/edit/{id}', [StudentController::class, 'edit'])->name('course.edit');
Route::post('/course/update/{id}', [StudentController::class, 'update'])->name('course.update');
