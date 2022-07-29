<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [PagesController::class, 'index']);

//Route::get('createPostForCategory', [CategoriesController::class, '__invoke']);

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('/blog', PostsController::class);

Route::resource('/categories', CategoriesController::class);

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/posts', 'posts');
    Route::get('admin/categories', 'categories');
    Route::get('admin/users', 'users');
});

Route::resource('/admin', AdminController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

