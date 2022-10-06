<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::get('/forms', [FormController::class, 'index']);
Route::get('/submission/{uuid}', [SubmissionController::class, 'show']);
Route::get('/forms/{id}', [FormController::class, 'show']);
Route::post('/forms/{id}', [FormController::class, 'submit']);

Route::prefix('data')->group(function () {
    Route::get('question/{id}', [QuestionController::class, 'getResponses']);
    Route::get('submissions/{formId}', [FormController::class, 'getAllSubmissions']);
});
// Auth
Route::prefix('auth')->group(function () {
    Route::post('signup', 'App\Http\Controllers\Api\Auth\AuthController@signup')->name('auth.signup');
    Route::post('login', 'App\Http\Controllers\Api\Auth\AuthController@login')->name('auth.login');
    Route::post('logout', 'App\Http\Controllers\Api\Auth\AuthController@logout')->middleware('auth:sanctum')->name('auth.logout');
    Route::get('user', 'App\Http\Controllers\Api\Auth\AuthController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

    Route::post('/password/email', 'App\Http\Controllers\Api\Auth\AuthController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
    Route::post('/password/reset', 'App\Http\Controllers\Api\Auth\AuthController@resetPassword')->name('password.reset');
});
