<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\WelcomeController;
use Database\Seeders\KategoriSeeder;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu

    // Welcome
    Route::get('/', [WelcomeController::class, 'index']);

    Route::get('/level', [LevelController::class, 'index']);
    Route::get('/kategori', [KategoriController::class, 'index']);

    // User
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);                          // menampilkan halaman user
            Route::get('/list', [UserController::class, 'list']);                       // menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']);                   // menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']);                         // menyimpan data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']);         // menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']);                // menyimpan data user baru Ajax
            Route::get('/{id}', [UserController::class, 'show']);                       // menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']);                  // menampilkan halaman form edit user 
            Route::put('/{id}', [UserController::class, 'update']);                     // menyimpan perubahan data user
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);        // menampilkan halaman form edit user AJax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    // menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);   // untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // untuk hapus data user Ajax
            Route::delete('/{id}', [UserController::class, 'destroy']);                 // menghapus data user
            Route::get('/import', [UserController::class, 'import']);                     
            Route::post('/import_ajax', [UserController::class, 'import_ajax']);
            Route::get('/export_excel', [UserController::class, 'export_excel']);
            Route::get('/export_pdf', [UserController::class, 'export_pdf']);

        });
    });

    // Kategori
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']); // menampilkan halaman awal Kategori
            Route::get('/list', [KategoriController::class, 'list']); // menampilkan data Kategori dalam bentuk json untuk datatables
            Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah Kategori
            Route::post('/', [KategoriController::class, 'store']);  // menyimpan data Kategori baru
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);
            Route::get('/{id}', [KategoriController::class, 'show']); // menampilkan detail Kategori
            Route::get('/{id}/edit', [KategoriController::class, 'edit']); // menampilkan halaman form edit Kategori
            Route::put('/{id}', [KategoriController::class, 'update']);  // menyimpan perubahan data Kategori
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
            Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data user
            Route::get('/import', [KategoriController::class, 'import']);                     
            Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
            Route::get('/export_excel', [KategoriController::class, 'export_excel']);
            Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);

        });

        // Level
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']); // menampilkan halaman awal Level
            Route::get('/list', [LevelController::class, 'list']); // menampilkan data Level dalam bentuk json untuk datatables
            Route::get('/create', [LevelController::class, 'create']); // menampilkan halaman form tambah Level
            Route::post('/', [LevelController::class, 'store']);  // menyimpan data Level baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::get('/{id}', [LevelController::class, 'show']); // menampilkan detail Level
            Route::get('/{id}/edit', [LevelController::class, 'edit']); // menampilkan halaman form edit Level
            Route::put('/{id}', [LevelController::class, 'update']);  // menyimpan perubahan data Level
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
            Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data user
            Route::get('/import', [LevelController::class, 'import']);                     
            Route::post('/import_ajax', [LevelController::class, 'import_ajax']);
            Route::get('/export_excel', [LevelController::class, 'export_excel']);
            Route::get('/export_pdf', [LevelController::class, 'export_pdf']);

        });
    });

    // Stok
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'stok'], function () {
            Route::get('/', [StokController::class, 'index']); // menampilkan halaman awal Supplier
            Route::get('/list', [StokController::class, 'list']); // menampilkan data Supplier dalam bentuk json untuk datatables
            Route::get('/create', [StokController::class, 'create']); // menampilkan halaman form tambah Supplier
            Route::post('/', [StokController::class, 'store']);  // menyimpan data Supplier baru
            Route::get('/create_ajax', [StokController::class, 'create_ajax']);
            Route::post('/ajax', [StokController::class, 'store_ajax']);
            Route::get('/{id}', [StokController::class, 'show']); // menampilkan detail Supplier
            Route::get('/{id}/edit', [StokController::class, 'edit']); // menampilkan halaman form edit Supplier
            Route::put('/{id}', [StokController::class, 'update']);  // menyimpan perubahan data Supplier
            Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
            Route::delete('/{id}', [StokController::class, 'destroy']); // menghapus data user
            Route::get('/import', [StokController::class, 'import']);                     
            Route::post('/import_ajax', [StokController::class, 'import_ajax']);
            Route::get('/export_excel', [StokController::class, 'export_excel']);
            Route::get('/export_pdf', [StokController::class, 'export_pdf']);

        });

        // Barang
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']); // menampilkan halaman awal Barang
            Route::get('/list', [BarangController::class, 'list']); // menampilkan data Barang dalam bentuk json untuk datatables
            Route::get('/create', [BarangController::class, 'create']); // menampilkan halaman form tambah Barang
            Route::post('/', [BarangController::class, 'store']);  // menyimpan data Barang baru
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
            Route::post('/ajax', [BarangController::class, 'store_ajax']);
            Route::get('/{id}', [BarangController::class, 'show']); // menampilkan detail Barang
            Route::get('/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman form edit Barang
            Route::put('/{id}', [BarangController::class, 'update']);  // menyimpan perubahan data Barang
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
            Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data user
            Route::get('/import', [BarangController::class, 'import']);
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
            Route::get('/export_excel', [BarangController::class, 'export_excel']);
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']);

        });

        Route::group(['prefix' => 'penjualan'], function () {
            Route::get('/', [PenjualanController::class, 'index']);
            Route::post('/list', [PenjualanController::class, 'list']);
            Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);
            Route::post('/ajax', [PenjualanController::class, 'store_ajax']);
            Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
            Route::get('/export_excel', [PenjualanController::class, 'export_excel']);
            Route::get('/export_pdf', [PenjualanController::class, 'export_pdf']);
        });
    });
});
