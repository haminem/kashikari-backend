<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/register_user', [ApiController::class, 'register_user']);
Route::post('/register_user', [ApiController::class, 'register_user']);

Route::get('/register_task', [ApiController::class, 'register_task']);
Route::post('/register_task', [ApiController::class, 'register_task']);

Route::get('/get_tasks', [ApiController::class, 'get_tasks']);
Route::post('/get_tasks', [ApiController::class, 'get_tasks']);

Route::get('/get_tasks_by_friend', [ApiController::class, 'get_tasks_by_friend']);
Route::post('/get_tasks_by_friend', [ApiController::class, 'get_tasks_by_friend']);

Route::get('/get_tasks_by_me', [ApiController::class, 'get_tasks_by_me']);
Route::post('/get_tasks_by_me', [ApiController::class, 'get_tasks_by_me']);

Route::get('/get_point', [ApiController::class, 'get_point']);
Route::post('/get_point', [ApiController::class, 'get_point']);

Route::get('/update_task_status', [ApiController::class, 'update_task_status']);
Route::post('/update_task_status', [ApiController::class, 'update_task_status']);

Route::get('/login', [ApiController::class, 'login']);
Route::post('/login', [ApiController::class, 'login']);

Route::get('/register_friend', [ApiController::class, 'register_friend']);
Route::post('/register_friend', [ApiController::class, 'register_friend']);

Route::get('/get_friends', [ApiController::class, 'get_friends']);
Route::post('/get_friends', [ApiController::class, 'get_friends']);
