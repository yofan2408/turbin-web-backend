<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('/update', [UserController::class, 'update']);
        Route::put('/photo', [UserController::class, 'updatePhoto']);
        Route::get('/photo', [UserController::class, 'getPhoto']);
    });

    // * Article Route
    Route::prefix('article')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/', [ArticleController::class, 'insert']);
            Route::put('/', [ArticleController::class, 'update']);
            Route::delete('/', [ArticleController::class, 'delete']);
        });
    });
});

Route::get('/article', [ArticleController::class, 'getArticleById']);
Route::get('/articles', [ArticleController::class, 'getArticles']);
