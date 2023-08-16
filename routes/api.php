<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function (Router $authenticatedRoute) {
    $authenticatedRoute->get('/user', function (Request $request) {
        return $request->user();
    });

    $authenticatedRoute->apiResource('task', TaskController::class); 

    $authenticatedRoute->post('/logout', [AuthController::class, 'logout']);

    $authenticatedRoute->apiResource('status', StatusController::class); 

    $authenticatedRoute->apiResource('comment', CommentController::class); 
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'createUser']);
