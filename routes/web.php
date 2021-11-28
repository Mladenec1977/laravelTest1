<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])
    ->name('postList');

Route::resources([
    'posts' => PostController::class
]);

Route::get('/post/like/{postId}/{userId}', [App\Http\Controllers\PostController::class, 'postLike']);

Route::post('/post/{id}/comment', [App\Http\Controllers\CommentController::class, 'store'])
    ->name('addComment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';
