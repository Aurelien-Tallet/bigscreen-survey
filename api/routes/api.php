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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/forms', [FormController::class, 'index']);
Route::get('/submission/{uuid}', [SubmissionController::class, 'show']);
Route::get('/forms/{id}', [FormController::class, 'show']);
Route::post('/forms/{id}', [FormController::class, 'submit']);

Route::prefix('data')->group(function () {
    Route::get('question/{id}', [QuestionController::class, 'getResponses']);
});
