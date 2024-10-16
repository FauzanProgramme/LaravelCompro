<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ServiceController as BackendServiceController;
use App\Http\Controllers\Backend\SliderController as BackendSliderController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/slider', [HomeController::class, 'slider'])->name('slider');

// Backend Routes
Route::prefix('backend')->name('backend.')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/sliders', [BackendSliderController::class, 'index'])->name('sliders.index');
    
    // Specific routes for services
    Route::get('/services', [BackendServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [BackendServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [BackendServiceController::class, 'store'])->name('services.store');

    //Route Blog
    Route::get('/blog', [BackendBlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BackendBlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BackendBlogController::class, 'store'])->name('blog.store');
    Route::delete('/blog/{id}', [BackendBlogController::class, 'destroy'])->name('blog.destroy');
});


