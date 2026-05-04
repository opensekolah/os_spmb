<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutCon;
use App\Http\Controllers\PengaturanCon;
use App\Http\Controllers\GuruCon;
use App\Http\Controllers\WaliCon;
use App\Http\Controllers\SiswaCon;



/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Koneksi database berhasil";
    } catch (\Exception $e) {
        return "Koneksi database gagal: " . $e->getMessage();
    }
});

//SambutCon
Route::get('/', [SambutCon::class, 'masukwali'])->name('masukwali');
Route::get('/masukguru', [SambutCon::class, 'masukguru'])->name('masukguru');

//PengaturanCon
Route::get('/pengaturan', [PengaturanCon::class, 'pengaturan'])->name('pengaturan');
Route::post('/pengaturan/banner', [PengaturanCon::class, 'updateBanner']);

//GuruCon
Route::post('/ruangguru', [GuruCon::class, 'ruangguru'])->name('ruangguru');
Route::get('/ruangguru', [GuruCon::class, 'ruangguru'])->name('ruangguru');

//WaliCon
Route::post('/ruangwali', [WaliCon::class, 'ruangwali'])->name('ruangwali');

//SiswaCon
Route::get('/datasiswa', [SiswaCon::class, 'index'])->name('index');

//Fullcalendar
Route::get('/events', [PengaturanCon::class, 'calendar']);
