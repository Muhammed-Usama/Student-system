<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiTeacherController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/', [NotificationController::class, 'sendNotification']);
Route::post('/savedevicetoken', [NotificationController::class, 'saveDeviceToken']);
Route::get('/tokens', [NotificationController::class, 'alltokens']);
// Route::group(['middleware' => ['api_student_auth']], function () {
Route::prefix('/student')->group(function () {
    Route::get('/show', [ApiController::class, 'show']);
    Route::get('/showid/{id}', [ApiController::class, 'showid']);
    Route::get('/delete/{id}', [ApiController::class, 'delete']);
    Route::post('/add', [ApiController::class, 'add']);
    Route::post('/update', [ApiController::class, 'update']);
});
Route::prefix('/teacher')->group(function () {
    Route::get('/show', [ApiTeacherController::class, 'show']);
    Route::get('/avg_grades', [ApiTeacherController::class, 'avg_grades']);
    Route::get('/showid/{id}', [ApiTeacherController::class, 'showid']);
    Route::get('/delete/{id}', [ApiTeacherController::class, 'delete']);
    Route::post('/add', [ApiTeacherController::class, 'add']);
    Route::post('/update', [ApiTeacherController::class, 'update']);
});
// });
