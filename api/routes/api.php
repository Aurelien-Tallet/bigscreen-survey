<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

//PUBLIC API ROUTES
Route::get('/forms', [FormController::class, 'index']);
Route::get('/submission/{uuid}', [SubmissionController::class, 'show']);
Route::get('/forms/{id}', [FormController::class, 'show']);
Route::post('/forms/{id}', [FormController::class, 'submit']);

//PRIVATE API ROUTES
Route::prefix('data')->group(function () {
    Route::get('question/{id}', [QuestionController::class, 'getResponses'])->middleware('auth:sanctum');
    Route::get('submissions/{formId}', [FormController::class, 'getAllSubmissions'])->middleware('auth:sanctum');
});

//AUTH API ROUTES
Route::prefix('auth')->group(function () {
    Route::post('signup', [AuthController::class, "signup"])->name('auth.signup');
    Route::post('login', [AuthController::class, "login"])->name('auth.login');
    Route::post('logout', [AuthController::class, "logout"])->middleware('auth:sanctum')->name('auth.logout');
    Route::get('user', [AuthController::class, "getAuthenticatedUser"])->middleware('auth:sanctum')->name('auth.user');
});
