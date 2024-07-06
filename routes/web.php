<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/student', [StudentController::class, 'index'])->name('student');

Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student.show');

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::post('/student/add', [StudentController::class, 'save'])->name('student.save');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');



//Crube operation of teacher


Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');

Route::get('/teacher/show/{id}', [TeacherController::class, 'show'])->name('teacher.show');

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
Route::post('/teacher/create', [TeacherController::class, 'save'])->name('teacher.save');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');


//Crube operation of course
Route::get('/course', [CourseController::class, 'index'])->name('course');

Route::get('/course/show/{id}', [CourseController::class, 'show'])->name('course.show');

Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::get('/course/delete/{id}', [CourseController::class, 'delete'])->name('student.delete');
Route::post('/student/create', [CourseController::class, 'save'])->name('course.save');
Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
