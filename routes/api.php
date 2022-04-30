<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
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

Route::prefix('todo')->group(function () {
    Route::controller(TodoController::class)->group(function () {
        Route::get('/', 'getTodos');

        Route::get('/done', 'getTodosDone');

        Route::post('/', 'createTodo');

        Route::get('/{id}', 'getTodo');

        Route::patch('/{id}', 'setDone');

        Route::delete('/{id}', 'deleteTodo');
    });
});
