<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
//use App\Http\Controllers\AuthController;

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

Route::get('/', [WeightController::class, 'index']);
Route::get('/weight_logs/search', [WeightController::class, 'search']);
Route::get('/register/step2', [WeightController::class, 'show']);
Route::post('/register/step2', [WeightController::class, 'storeStep2'])->name('register.step2.store');

Route::middleware('auth')->group(function () {
    Route::get('/', [WeightController::class, 'index']);
    Route::get('/weight_logs/create', [WeightController::class, 'create']);
    Route::post('/weight_logs', [WeightController::class, 'store']);
    Route::get('/weight_logs', [WeightController::class, 'index']);
    Route::get('/weight_logs/{weightLogId}', [WeightController::class, 'edit']);
    Route::post('/weight_logs/{weightLogId}/update', [WeightController::class, 'update']);
    Route::post('/weight_logs/{id}/delete', [WeightController::class, 'destroy']);
    Route::get('/goal', [WeightController::class, 'showGoalSetting']);
    Route::post('/weight_logs/goal_setting', [WeightController::class, 'updateGoalSetting']);
});


