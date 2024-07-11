<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);

Route::group(['middleware' => ['api_student_auth']], function () {

    Route::get('/show', [ApiController::class, 'show']);
    Route::get('/showid/{id}', [ApiController::class, 'showid']);
    Route::post('/delete', [ApiController::class, 'delete']);
    Route::post('/add', [ApiController::class, 'add']);
    Route::post('/update', [ApiController::class, 'update']);

});
