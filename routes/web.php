<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    Route::get('login', [AdminController::class, 'login'])->name('login');
    Route::post('con', [AdminController::class, 'con'])->name('con');
    Route::group(['middlware' => ['admin']], function () {

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    });
});

Route::prefix('/student')->namespace('App\Http\Controllers\Student')->group(function () {
    Route::get('/index', [StudentController::class, 'index'])->name('student');

    Route::get('show/{id}', [StudentController::class, 'show'])->name('student.show');

    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::get('delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::post('add', [StudentController::class, 'save'])->name('student.save');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update/{id}', [StudentController::class, 'update'])->name('student.update');

});



//Crube operation of teacher

Route::prefix('/teacher')->namespace('App\Http\Controllers\Teacher')->group(function () {
    Route::get('', [TeacherController::class, 'index'])->name('teacher');

    Route::get('show/{id}', [TeacherController::class, 'show'])->name('teacher.show');

    Route::get('create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('courses', [TeacherController::class, 'courses'])->name('teacher.courses');
    Route::get('grades/{id}', [TeacherController::class, 'grades'])->name('teacher.grades');
    Route::post('grade_continue', [TeacherController::class, 'grades_con'])->name('teacher.grade_continue');
    Route::post('grades_save', [TeacherController::class, 'grades_save'])->name('teacher.grades_save');
    Route::get('delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    Route::post('create', [TeacherController::class, 'save'])->name('teacher.save');
    Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::post('save_course', [TeacherController::class, 'save_course'])->name('teacher.save_course');
    Route::get('show_course/{course}', [TeacherController::class, 'show_course'])->name('teacher-course.show');
    Route::get('grades_teacher', [TeacherController::class, 'grades_teacher']);
});

//Crube operation of course
Route::prefix('/course')->namespace('App\Http\Controllers\Course')->group(function () {
    Route::get('', [CourseController::class, 'index'])->name('course');

    Route::get('show/{id}', [CourseController::class, 'show'])->name('course.show');

    Route::get('create', [CourseController::class, 'create'])->name('course.create');
    Route::get('delete/{id}', [CourseController::class, 'delete'])->name('course.delete');
    Route::post('/create', [CourseController::class, 'save'])->name('course.save');
    Route::get('edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('update/{id}', [CourseController::class, 'update'])->name('course.update');
});
