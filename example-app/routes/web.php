<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/rofile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [PostsController::class,'getAllPosts'])->name('dashboard');
    Route::get('/dashboard', [PostsController::class,'getAllPosts'])->name('dashboard');
    Route::get('/categories', [CategoriesController::class,'getAllCategories'])->name('categories');

    Route::get('/bookmarks', [BookmarkController::class, 'showAllBookmark'])->name('bookmarks.show');
    Route::post('/addBookmark/{id}', [BookmarkController::class, 'addBookmark'])->name('bookmark.add');
    Route::post('/deleteBookmark/{id}', [BookmarkController::class, 'deleteBookmark'])->name('bookmark.delete');
});

Route::group(['auth', 'checkRoles'], function () {
    Route::get('/members', [ProfileController::class,'memberList'])->name('members.show');

    Route::get('/new_post', [PostsController::class, 'newPostForm'])->name('newPost');
    Route::get('/edit_post/{id}', [PostsController::class, 'editPostForm'])->name('editPost');

    Route::get('/new_categories', [CategoriesController::class, 'newCategoriesForm'])->name('newCategories');
    Route::get('/edit_categories/{id}', [CategoriesController::class, 'editCategoriesForm'])->name('editCategories');
});

require __DIR__.'/auth.php';
