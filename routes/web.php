<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/customer/{id}', [PageController::class, 'customer']);
Route::get('/agent', [PageController::class, 'agent']);
Route::post('/register', [PageController::class, 'register']);
Route::post('/agent/update/{id}', [PageController::class, 'update']);


?>