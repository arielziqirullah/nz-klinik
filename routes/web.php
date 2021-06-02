<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginController;

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
Route::group([], function () {
    Route::get('/', [FrontEndController::class, 'beranda'])->name('beranda');
    Route::get('/layanan', [FrontEndController::class, 'layanan'])->name('layanan');
    Route::get('/profile-dokter', [FrontEndController::class, 'profil'])->name('profil');
    Route::get('/lokasi', [FrontEndController::class, 'lokasi'])->name('lokasi');
    Route::get('/catalog', [FrontEndController::class, 'catalog'])->name('catalog');
    Route::get('/daftar-pasien', [FrontEndController::class, 'daftarPasien'])->name('daftar');
    Route::post('/proses-daftar', [FrontEndController::class, 'daftarProcess'])->name('proses_daftar');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index'])->name('change_password');
Route::post('/process-change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'process'])->name('process_change_password');

Route::prefix('patient')->group( function () {
    Route::get('index', [App\Http\Controllers\Admin\PatientController::class, 'index'])->name('patient_index');
    Route::get('/get-complaints', [App\Http\Controllers\Admin\PatientController::class, 'getComplaints']);
});

Route::prefix('slider')->group( function () {
    Route::get('', [App\Http\Controllers\Admin\SlideController::class, 'index'])->name('slider_index');
    Route::get('/create', [App\Http\Controllers\Admin\SlideController::class, 'create'])->name('slider_create');
    Route::get('{slider}/edit', [App\Http\Controllers\Admin\SlideController::class, 'edit']);
    Route::post('/store', [App\Http\Controllers\Admin\SlideController::class, 'store'])->name('slider_store');
    Route::put('/update/{slide}', [App\Http\Controllers\Admin\SlideController::class, 'update'])->name('slider_update');
    Route::delete('/delete/{slide}', [App\Http\Controllers\Admin\SlideController::class, 'destroy'])->name('slider_delete');
});

Route::prefix('dentist')->group( function () {
    Route::get('', [App\Http\Controllers\Admin\DentistController::class, 'index'])->name('tindakan_index');
    Route::get('/create', [App\Http\Controllers\Admin\DentistController::class, 'create'])->name('tindakan_create');
    Route::get('{dentist}/edit', [App\Http\Controllers\Admin\DentistController::class, 'edit']);
    Route::post('/store', [App\Http\Controllers\Admin\DentistController::class, 'store'])->name('tindakan_store');
    Route::put('/update/{dentist}', [App\Http\Controllers\Admin\DentistController::class, 'update'])->name('tindakan_update');
    Route::delete('/delete/{dentist}', [App\Http\Controllers\Admin\DentistController::class, 'destroy'])->name('tindakan_delete');
});

Route::prefix('category')->group( function () {
    Route::get('', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category_index');
    Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category_create');
    Route::get('{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category_store');
    Route::put('/update/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category_update');
    Route::delete('/delete/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category_delete');
});

Route::prefix('product')->group( function () {
    Route::get('', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product_index');
    Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product_create');
    Route::get('{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product_store');
    Route::put('/update/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product_update');
    Route::delete('/delete/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product_delete');
});

Route::get('data/patient', App\Http\Controllers\Admin\DataTable\PatientController::class)->name('patient.data');
Route::get('data/slider', App\Http\Controllers\Admin\DataTable\SlideController::class)->name('slider.data');
Route::get('data/dentist', App\Http\Controllers\Admin\DataTable\DentistController::class)->name('dentist.data');
Route::get('data/category', App\Http\Controllers\Admin\DataTable\CategoryController::class)->name('category.data');
Route::get('data/product', App\Http\Controllers\Admin\DataTable\ProductController::class)->name('product.data');