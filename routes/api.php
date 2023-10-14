<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ImportController;
use App\Http\Controllers\Api\LessonsController;
use App\Http\Controllers\Api\LearningController;
use App\Http\Controllers\Api\NodesController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function ($route) {
    $route->apiResource('lessons', LessonsController::class);

    $route->apiResource('node', NodesController::class);
    $route->apiResource('exercise', ExerciseController::class);


    $route->get('learning', [LearningController::class, 'processLearning']);
    $route->get('writing', [LearningController::class, 'writing']);

    $route->post('import-exercises', [ImportController::class, 'exercise']);
});

Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

Route::get('login', function () {
    return 'welcome, please login';
})->name('login');
