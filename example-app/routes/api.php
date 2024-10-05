<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['auth', 'checkRoles'], function () {
    Route::post('/createNewPost', [PostsController::class, 'createNewPost'])->name('post.create');
    Route::post('/editPost/{id}', [PostsController::class, 'editPost'])->name('post.update');
    Route::post('/delete_post/{id}', [PostsController::class, 'deletePost'])->name('post.delete');

    Route::post('/createNewCategories', [CategoriesController::class, 'createNewCategories'])->name('categories.create');
    Route::post('/editCategories/{id}', [CategoriesController::class, 'editCategories'])->name('categories.update');
    Route::post('/delete_categories/{id}', [CategoriesController::class, 'deleteCategories'])->name('categories.delete');
});
