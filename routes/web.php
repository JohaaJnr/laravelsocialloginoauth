<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\GoogleloginController;
use App\Http\Controllers\GithubloginController;
use App\Http\Controllers\TasksController;

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

Route::get('/', [RoutesController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [TasksController::class, 'index'])->middleware('auth');

Route::get('/google', [GoogleloginController::class, 'google'] );

Route::get('/google/auth/callback', [GoogleloginController::class, 'google_callback'] );

Route::get('/github', [GithubloginController::class, 'github']);
Route::get('/github/auth/callback', [GithubloginController::class, 'github_callback']);

Route::post('/submit-form', [TasksController::class, 'store'])->middleware('auth');

Route::get('/edit/task/{id}', [TasksController::class, 'edit'])->middleware('auth');
Route::post('/update-form/{id}', [TasksController::class, 'update'])->middleware('auth');

Route::get('/delete/task/{id}', [TasksController::class, 'destroy']);

Route::get('/logout', [RoutesController::class, 'logout']);