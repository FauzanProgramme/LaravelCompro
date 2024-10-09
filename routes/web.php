<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\backend\BlogController as BackendBlogController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\ServiceController as BackendServiceController;
use App\Http\Controllers\backend\SliderController as BackendSliderController;

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

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/slider', [HomeController::class, 'slider'])->name('slider');

// Backend Routes
Route::prefix('backend')->name('backend.')->group(function () {
    Route::get('/blog', [BackendBlogController::class, 'index'])->name('blog.index');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/sliders', [BackendSliderController::class, 'index'])->name('sliders.index');
    Route::get('/services', [BackendServiceController::class, 'index'])->name('services.index');
});
