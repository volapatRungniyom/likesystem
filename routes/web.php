<?php

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
    return redirect()->route('posts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/appeals/progress',[\App\Http\Controllers\AppealController::class,'showProgress'])
    ->name('appeals.progress');
Route::get('/appeals/inProgress',[\App\Http\Controllers\AppealController::class,'showInProgress'])
    ->name('appeals.inProgress');
Route::get('/appeals/success',[\App\Http\Controllers\AppealController::class,'showSuccess'])
    ->name('appeals.success');

Route::post('/like-posts/{id}',[\App\Http\Controllers\PostController::class,'likePost'])->name('like.posts');
Route::post('/unlike-posts/{id}',[\App\Http\Controllers\PostController::class,'unlikePost'])->name('unlike.posts');
require __DIR__.'/auth.php';


Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/appeals', \App\Http\Controllers\AppealController::class);
Route::resource('/tags', \App\Http\Controllers\TagController::class);
Route::resource('/stats', \App\Http\Controllers\StatController::class);

