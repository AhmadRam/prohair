<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::group(['middleware' => ['language']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('shop.index');

    Route::get('/search', [HomeController::class, 'search'])->name('shop.search');

    Route::get('product/{url_path}', [ProductController::class, 'view'])->name('shop.product');

    Route::get('category/{url_path}', [CategoryController::class, 'view'])->name('shop.category');

    Route::get('news', [NewsController::class, 'index'])->name('shop.news');

    Route::get('news/{id}', [NewsController::class, 'view'])->name('shop.single-news');
    
    Route::get('blogs', [BlogsController::class, 'index'])->name('shop.blogs');

    Route::get('blog/{id}', [BlogsController::class, 'view'])->name('shop.blog');
    
    Route::get('page/{url_path}', [PageController::class, 'view'])->name('shop.page');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
