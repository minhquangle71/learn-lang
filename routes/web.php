<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

// Lesson
Route::get('/lesson', [LessonController::class, 'index'])->name('lesson.index');
Route::get('/lesson/create', [LessonController::class, 'create'])->name('lesson.create');
Route::post('/lesson/create', [LessonController::class, 'store'])->name('lesson.store');
Route::get('/lesson/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');

// Vocabulary
Route::get('/lesson/{lesson_id}/vocabulary', [VocabularyController::class, 'index'])->name('lesson-vocabulary.index');
Route::get('/lesson/{lesson_id}/vocabulary/create', [VocabularyController::class, 'create'])->name('lesson-vocabulary.create');
Route::post('/lesson/{lesson_id}/vocabulary/create', [VocabularyController::class, 'store'])->name('lesson-vocabulary.store');
Route::get('/lesson/{lesson_id}/vocabulary/{id}/edit', [VocabularyController::class, 'edit'])->name('lesson-vocabulary.edit');
Route::put('/lesson/{lesson_id}/vocabulary/{id}/edit', [VocabularyController::class, 'update'])->name('lesson-vocabulary.update');


Route::get('/contest-vocabulary/{lesson_id}', [ContestController::class, 'index'])->name('contest.index');
Route::get('/contest-vocabulary/{lesson_id}/load-qa', [ContestController::class, 'loadQA'])->name('contest.load-qa');
