<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\KetuaLab;
use App\Http\Controllers\Manager;
use App\Http\Controllers\PetugasLab;
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

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('/logout', 'logout');
});

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cekUserLogin:1']], function(){
        Route::controller(Admin::class)->group(function(){
            Route::get('admin', 'index')->name('admin');
            

            Route::get('pegawai/admin', 'showpegawai');
            Route::get('pegawai/create', 'add_pegawai')->name('pegawai-create');
            Route::post('pegawai/create/store', 'store_pegawai');
            Route::get('pegawai/edit/{id_pegawai}', 'edit_pegawai')->name('pegawai-edit');
            Route::post('pegawai/update/{id_pegawai}', 'update_pegawai')->name('pegawai-update');
            Route::get('pegawai/delete/{id_pegawai}', 'destroy_pegawai')->name('pegawai-delete');
            

            Route::get('laboratorium/admin', 'showlab');
            Route::get('laboratorium/create', 'add_lab')->name('laboratorium-create');
            Route::post('laboratorium/create/store', 'store_laboratorium');
            Route::get('laboratorium/edit/{id_lab}', 'edit_lab')->name('laboratorium-edit');
            Route::post('laboratorium/update/{id_lab}', 'update_lab')->name('laboratorium-update');
            Route::get('laboratorium/delete/{id_lab}', 'destroy_lab')->name('laboratorium-delete');

            Route::get('lapangan/admin', 'showlapangan');
            Route::get('lapangan/create', 'add_lapangan')->name('lapangan-create');
            Route::post('lapangan/create/store', 'store_lapangan');
            Route::get('lapangan/edit/{id_lapangan}', 'edit_lapangan')->name('lapangan-edit');
            Route::post('lapangan/update/{id_lapangan}', 'update_lapangan')->name('lapangan-update');
            Route::get('lapangan/delete/{id_lapangan}', 'destroy_lapangan')->name('lapangan-delete');

            Route::get('sampel/admin', 'showsampel');
            Route::get('sampel/create', 'add_sampel')->name('sampel-create');
            Route::post('sampel/create/store', 'store_sampel');
            Route::get('sampel/edit/{id_sampel}', 'edit_sampel')->name('sampel-edit');
            Route::post('sampel/update/{id_sampel}', 'update_sampel')->name('sampel-update');
            Route::get('sampel/delete/{id_sampel}', 'destroy_sampel')->name('sampel-delete');

            Route::get('user/admin', 'showuser');
            Route::get('user/create', 'add_user')->name('user-create');
            Route::post('user/create/store', 'store_user');
            Route::get('user/edit/{id_user}', 'edit_user')->name('user-edit');
            Route::post('user/update/{id_user}', 'update_user')->name('user-update');
            Route::get('user/delete/{id_user}', 'destroy_user')->name('user-delete');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function(){
        Route::controller(PetugasLab::class)->group(function(){
            Route::get('petugas', 'index')->name('petugas');
            Route::get('pohon/create/petugas', 'add_pohon')->name('pohon-create-petugas');
            Route::post('pohon/create/store/petugas', 'store_pohon');
            Route::get('pohon/detail/{id_pohon}/petugas', 'detail_pohon')->name('pohon-detail-petugas');
            Route::get('pohon/edit/{id_pohon}/petugas', 'edit_pohon')->name('pohon-edit-petugas');
            Route::post('pohon/update/{id_pohon}/petugas', 'update_pohon')->name('pohon-update-petugas');
            Route::post('pohon/{id_pohon}/set-tanggal-kematian/petugas', 'update_tglmati')->name('update-tanggal-kematian-petugas');
            Route::post('pohon/{id_pohon}/set-bukti-kematian/petugas', 'update_buktimati')->name('update-bukti-kematian-petugas');
            Route::get('pohon/delete/{id_pohon}/petugas', 'delete_pohon')->name('pohon-delete-petugas');

            Route::get('jadwal/petugas', 'showjadwal');
            Route::get('get/jadwal', 'get_jadwal');

            Route::get('sampel/petugas', 'showsampel');
            Route::get('sampel/create/petugas', 'add_sampel')->name('sampel-create-petugas');
            Route::post('sampel/create/store/petugas', 'store_sampel');
            Route::get('sampel/detail/{id_sampel}/petugas', 'detail_sampel')->name('sampel-detail-petugas');
            Route::get('sampel/edit/{id_sampel}/petugas', 'edit_sampel')->name('sampel-edit-petugas');
            Route::post('sampel/update/{id_sampel}/petugas', 'update_sampel')->name('sampel-update-petugas');
            Route::get('sampel/delete/{id_sampel}/petugas', 'destroy_sampel')->name('sampel-delete-petugas');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function(){
        Route::controller(KetuaLab::class)->group(function(){
            Route::get('ketualab', 'index')->name('ketualab');
            Route::get('pohon/create/ketualab', 'add_pohon')->name('pohon-create-ketualab');
            Route::post('pohon/create/store/ketualab', 'store_pohon');
            Route::get('pohon/detail/{id_pohon}/ketualab', 'detail_pohon')->name('pohon-detail-ketualab');
            Route::get('pohon/edit/{id_pohon}/ketualab', 'edit_pohon')->name('pohon-edit-ketualab');
            Route::post('pohon/update/{id_pohon}/ketualab', 'update_pohon')->name('pohon-update-ketualab');
            Route::post('pohon/{id_pohon}/set-tanggal-kematian/ketualab', 'update_tglmati')->name('update-tanggal-kematian-ketualab');
            Route::post('pohon/{id_pohon}/set-bukti-kematian/ketualab', 'update_buktimati')->name('update-bukti-kematian-ketualab');
            Route::get('pohon/delete/{id_pohon}/ketualab', 'delete_pohon')->name('pohon-delete-ketualab');

            Route::get('laboratorium/ketualab', 'showlab');
            Route::get('lapangan/ketualab', 'showlapangan');

            Route::get('jadwal/ketualab', 'showjadwal');
            Route::get('api/jadwal', 'get_jadwal');
            Route::get('jadwal/create/ketualab', 'add_jadwal')->name('jadwal-create-ketualab');
            Route::post('jadwal/create/store/ketualab', 'store_jadwal');

            Route::get('sampel/ketualab', 'showsampel');
            Route::get('sampel/create/ketualab', 'add_sampel')->name('sampel-create-ketualab');
            Route::post('sampel/create/store/ketualab', 'store_sampel');
            Route::get('sampel/detail/{id_sampel}/ketualab', 'detail_sampel')->name('sampel-detail-ketualab');
            Route::get('sampel/edit/{id_sampel}/ketualab', 'edit_sampel')->name('sampel-edit-ketualab');
            Route::post('sampel/update/{id_sampel}/ketualab', 'update_sampel')->name('sampel-update-ketualab');
            Route::get('sampel/delete/{id_sampel}/ketualab', 'destroy_sampel')->name('sampel-delete-ketualab');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:4']], function(){
        Route::controller(Manager::class)->group(function(){
            Route::get('manager', 'index')->name('manager');
            Route::get('pohon/detail/{id_pohon}', 'detail_pohon')->name('pohon-detail-manager');

            Route::get('laboratorium/manager', 'showlab');
            Route::get('lapangan/manager', 'showlapangan');

            Route::get('jadwal/manager', 'showjadwal');
            Route::get('ambil/jadwal', 'get_jadwal');

            Route::get('sampel/manager', 'showsampel');
            Route::get('sampel/detail/{id_sampel}', 'detail_sampel')->name('sampel-detail');
        });
    });

});
