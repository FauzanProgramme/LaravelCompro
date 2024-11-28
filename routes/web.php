<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ServiceController as BackendServiceController;
use App\Http\Controllers\Backend\SliderController as BackendSliderController;
use App\Http\Controllers\Backend\ConfigurationController as BackendConfigurationController;
use App\Http\Controllers\Backend\ProductController as BackendProductController;
use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\ProductController;



// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog_detail');
Route::get('/slider', [HomeController::class, 'slider'])->name('slider');
Route::get('/product', [ProductController::class, 'index'])->name('product');
    //Route untuk login
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/aksi_login', [LoginController::class, 'aksi_login'])->name('aksi_login');
    

// Backend Routes
Route::prefix('backend')->name('backend.')->group(function () {

    //Route untuk Sliders
    Route::get('/sliders', [BackendSliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/tambah', [BackendSliderController::class, 'tambah'])->name('sliders.tambah'); // Menampilkan form tambah slider
    Route::post('/sliders/aksi_tambah', [BackendSliderController::class, 'aksi_tambah'])->name('sliders.aksi_tambah');   // Menyimpan slider baru
    Route::post('/sliders/{id}/hapus', [BackendSliderController::class, 'hapus'])->name('sliders.hapus'); // Route untuk hapus slider
    Route::get('/sliders/{id}/edit', [BackendSliderController::class, 'edit'])->name('sliders.edit');
    Route::post('/sliders/{id}/aksi_edit', [BackendSliderController::class, 'aksi_edit'])->name('sliders.aksi_edit');



    // Specific routes for services
    Route::get('/services', [BackendServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [BackendServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [BackendServiceController::class, 'store'])->name('services.store');
    Route::post('/services/{id}/delete', [BackendServiceController::class, 'aksi_hapus'])->name('services.delete');
    Route::get('/services/{id}/edit', [BackendServiceController::class, 'edit'])->name('services.edit');
    Route::post('/services/{id}/aksi_edit', [BackendServiceController::class, 'aksi_edit'])->name('services.aksi_edit');


    //Route Blog
    Route::get('/blog', [BackendBlogController::class, 'index'])->name('blog.index'); 
    Route::get('/blog/create', [BackendBlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BackendBlogController::class, 'store'])->name('blog.store');
    Route::delete('/blog/{id}', [BackendBlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blog/edit/{id}', [BackendBlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/aksi_edit/{id}', [BackendBlogController::class, 'aksi_edit'])->name('blog.aksi_edit');

    //Route Configuration
    Route::get('/configuration', [BackendConfigurationController::class,'index'])->name('configuration');
    Route::post('/configuration/aksi_edit',[BackendConfigurationController::class,'aksi_edit'])->name('aksi_edit');
    //Route Product
    Route::get('/product',[BackendProductController::class,'index'])->name('product');
    Route::get ('product/tambah',[BackendProductController::class,'tambah'])->name('product.tambah');
    Route::post('product/aksi_tambah',[BackendProductController::class,'aksi_tambah'])->name('product.aksi_tambah');
    Route::get('/product/edit/{id}', [BackendProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/aksi_edit{id}',[BackendProductController::class,'aksi_edit'])->name('product.aksi_edit');
    Route::post('/product/aksi_hapus{id}',[BackendProductController::class,'aksi_hapus'])->name('product.aksi_hapus');
    Route::get('/product/restoreProduct',[BackendProductController::class,'restoreProduct'])->name('product.restoreProduct');
    //Route Category
    Route::get('/category',[BackendCategoryController::class,'index'])->name('category');
    Route::get('/category/tambah',[BackendCategoryController::class,'tambah'])->name('category.tambah');
    Route::post('/category/aksi_tambah',[BackendCategoryController::class,'aksi_tambah'])->name('category.aksi_tambah');
});
