<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, MahasiswaController, DosenController, ProdiController, ProductController, TypeController};
use App\Http\Controllers\Admin\ViewController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();
// Route Admin
Route::middleware(['auth', 'leveluser:admin'])->group(function () {
    Route::get('/admin', [ViewController::class, 'index'])->name('admin.index');

    Route::get('/admin/data-dosen', [ViewController::class, 'showDosen'])->name('admin.dosen');
    Route::get('/admin/data-dosen/add-dosen', [DosenController::class, 'create'])->name('admin.dosen.add');
    Route::post('/admin/data-dosen/add-dosen', [DosenController::class, 'store']);
    Route::delete('/admin/data-dosen/delete-dosen/{user:nomor_induk}', [DosenController::class, 'destroy'])->name('admin.dosen.delete');
    Route::get('/admin/data-dosen/edit-dosen/{user:nomor_induk}', [DosenController::class, 'edit']);
    Route::put('/admin/data-dosen/edit-dosen/{user:nomor_induk}', [DosenController::class, 'update']);

    Route::get('/admin/data-mahasiswa', [ViewController::class, 'showMahasiswa'])->name('admin.mahasiswa');
    Route::get('/admin/data-mahasiswa/add-mahasiswa', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.add');
    Route::post('/admin/data-mahasiswa/add-mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/admin/data-mahasiswa/edit-mahasiswa/{user:nomor_induk}', [MahasiswaController::class, 'edit']);
    Route::put('/admin/data-mahasiswa/edit-mahasiswa/{user:nomor_induk}', [MahasiswaController::class, 'update']);
    Route::delete('/admin/data-mahasiswa/delete-mahasiswa/{user:nomor_induk}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.delete');

    Route::get('/admin/data-product', [ViewController::class, 'showProduct'])->name('admin.product');
    Route::get('/admin/data-product/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/data-product/edit-product/{product}', [ProductController::class, 'update']);
    Route::delete('/admin/data-product/delete-product/{product}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/admin/verify-product', [ViewController::class, 'productVerification'])->name('admin.verify-product');
    Route::put('/admin/verify-product/{product}', [ProductController::class, 'updateType']);

    Route::get('/admin/program-study', [ViewController::class, 'showProdi'])->name('admin.prodi');
    Route::get('/admin/program-study/add-program', [ProdiController::class, 'create'])->name('admin.prodi.add');
    Route::post('/admin/program-study/add-program', [ProdiController::class, 'store']);
    Route::get('/admin/program-study/edit-program/{prodi}', [ProdiController::class, 'edit']);
    Route::put('/admin/program-study/edit-program/{prodi}', [ProdiController::class, 'update']);
    Route::delete('/admin/program-study/delete-program/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.delete');

    Route::get('/admin/type-product', [ViewController::class, 'showType'])->name('admin.type');
    Route::get('/admin/type-product/add-type', [TypeController::class, 'create'])->name('admin.type.add');
    Route::post('/admin/type-product/add-type', [TypeController::class, 'store']);
    Route::get('/admin/type-product/edit-type/{type}', [TypeController::class, 'edit'])->name('admin.type.edit');
    Route::put('/admin/type-product/edit-type/{type}', [TypeController::class, 'update']);
    Route::delete('/admin/type-product/delete-type/{type}', [TypeController::class, 'destroy'])->name('admin.type.delete');

    Route::view('/admin/profile', 'admin.profile')->name('admin.profile');
    Route::put('/admin/profile/{user:nomor_induk}', [ViewController::class, 'update'])->name('admin.update');
});
// Route User (Mahasiswa)
Route::middleware(['auth', 'leveluser:mahasiswa'])->group(function () {
    Route::get('mahasiswa/{user:nomor_induk}', [MahasiswaController::class, 'index'])->name('mahasiswa.profile');
    Route::get('mahasiswa/{Product}/product', [MahasiswaController::class, 'show']);
    Route::get('mahasiswa/product/{user:nomor_induk}', [MahasiswaController::class, 'userProduct'])->name('mahasiswa.add.product');
    Route::put('mahasiswa/update-profil/{user:nomor_induk}', [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.profile.update');
});
// Route User (Dosen)
Route::middleware(['auth', 'leveluser:dosen'])->group(function () {
    Route::get('dosen/{User:nomor_induk}', [DosenController::class, 'index'])->name('dosen.profile');
    Route::get('dosen/{Product}/product', [DosenController::class, 'show']);
    Route::get('dosen/product/{user:nomor_induk}', [DosenController::class, 'userProduct'])->name('dosen.add.product');
    Route::put('dosen/update-profil/{user:nomor_induk}', [DosenController::class, 'updateProfile'])->name('dosen.profile.update');
});
// Route Bersama
Route::middleware(['auth', 'leveluser:mahasiswa,dosen,admin'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/product/{Product}', [HomeController::class, 'show']);
    Route::get('/product/download-product/{filename}', [HomeController::class, 'download'])->name('download.product');
    Route::post('/product/{user:nomor_induk}', [HomeController::class, 'upload'])->name('upload.product');
    Route::get('/home/search-product', [HomeController::class, 'search'])->name('search.product');
});
