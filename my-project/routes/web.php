<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

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
});

Route::get('comment', function() {
    return view('comment');
});

Route::post('article/get', [ArticleController::class, 'get']);
Route::post('comment/get', [CommentController::class, 'get']);
Route::post('comment/post', [CommentController::class, 'post']);

