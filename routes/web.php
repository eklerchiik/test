<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::post('/posts', [PostController::class, 'create'])->middleware('auth');

Route::post('/posts/{id}', [PostController::class, 'update'])->middleware('auth');

Route::get('/', [PostController::class, 'list'])->middleware('auth')->name('home');

Route::get('/posts/{id}', [PostController::class, 'get'])->middleware('auth');

Route::post('/deletePost/{id}', [PostController::class, 'delete'])->middleware('auth');

Auth::routes();
