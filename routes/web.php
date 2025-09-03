<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KampanyeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanPDFController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// REMOVE this duplicate route
// Route::get('/', function () {
//     return view('home');
// });

// ADD the name('home') to this route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Kampanye Routes
Route::get('/kampanye', [KampanyeController::class, 'index'])->name('kampanye.index');
Route::get('/kampanye/create', [KampanyeController::class, 'create'])->name('kampanye.create');
Route::post('/kampanye', [KampanyeController::class, 'store'])->name('kampanye.store');
Route::get('/kampanye/thankyou', [KampanyeController::class, 'thankyou'])->name('kampanye.thankyou');
Route::get('/kampanye/{id}', [KampanyeController::class, 'show'])->name('kampanye.show');

// Tambahkan route ini
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// Berita Routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Agenda Routes
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

// Pengaduan Routes
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('/pengaduan/buat', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/terima-kasih', [PengaduanController::class, 'thankyou'])->name('pengaduan.thankyou');

// Routes untuk Pengaduan PDF
Route::get('pengaduan/{pengaduan}/pdf', [PengaduanPDFController::class, 'generatePDF'])
    ->name('pengaduan.generate-pdf')
    ->middleware(['auth']);

// Route untuk verifikasi QR Code (tambahkan jika belum ada)
Route::get('pengaduan/verify/{id}', [PengaduanPDFController::class, 'verify'])
    ->name('pengaduan.verify');