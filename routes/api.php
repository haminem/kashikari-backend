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

// Route::get('/sign_in', [ApiController::class, 'sign_in']);
Route::post('/sign_in', [ApiController::class, 'sign_in']);

// Route::get('/sign_up', [ApiController::class, 'sign_up']);
Route::post('/sign_up', [ApiController::class, 'sign_up']);

// Route::get('/get_user', [ApiController::class, 'get_user']);
Route::post('/get_user', [ApiController::class, 'get_user']);

// Route::get('/get_friends', [ApiController::class, 'get_friends']);
Route::post('/get_friends', [ApiController::class, 'get_friends']);

// Route::get('/get_tasks', [ApiController::class, 'get_tasks']);
Route::post('/get_tasks', [ApiController::class, 'get_tasks']);

// Route::get('/set_task', [ApiController::class, 'set_task']);
Route::post('/set_task', [ApiController::class, 'set_task']);

// Route::get('/update_task', [ApiController::class, 'update_task']);
Route::post('/update_task', [ApiController::class, 'update_task']);

// Route::get('/get_point', [ApiController::class, 'get_point']);
Route::post('/get_point', [ApiController::class, 'get_point']);

// Route::get('/follow', [ApiController::class, 'follow']);
Route::post('/follow', [ApiController::class, 'follow']);
