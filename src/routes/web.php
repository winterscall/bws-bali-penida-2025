<?php

use App\Http\Controllers\Public\AgendaController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\GaleriController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OrganisasiController;
use App\Http\Controllers\Public\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/visi_misi', [ProfileController::class, 'visi_misi'])->name('visi_misi');
    Route::get('/tugas_dan_fungsi', [ProfileController::class, 'tugas_dan_fungsi'])->name('tugas_dan_fungsi');
    Route::get('/wilayah_administrasi', [ProfileController::class, 'wilayah_administrasi'])->name('wilayah_administrasi');
    Route::get('/struktur_organisasi', [ProfileController::class, 'struktur_organisasi'])->name('struktur_organisasi');
    Route::get('/informasi_kantor', [ProfileController::class, 'informasi_kantor'])->name('informasi_kantor');
    Route::get('/faq', [ProfileController::class, 'faq'])->name('faq');

    Route::prefix('organisasi')->name('organisasi.')->group(function () {
        Route::get('/seksi_op', [OrganisasiController::class, 'seksi_op'])->name('seksi_op');
        Route::get('/seksi_op', [OrganisasiController::class, 'seksi_op'])->name('seksi_op');
        Route::get('/seksi_op', [OrganisasiController::class, 'seksi_op'])->name('seksi_op');
        Route::get('/seksi_op', [OrganisasiController::class, 'seksi_op'])->name('seksi_op');
    });
});

Route::prefix('galeri')->name('galeri.')->group(function () {
    Route::get('/foto', [GaleriController::class, 'foto'])->name('foto');
    Route::get('/foto/{album}', [GaleriController::class, 'foto_detail'])->name('foto_detail');
    Route::get('/video', [GaleriController::class, 'video'])->name('video');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/{slug}', [BeritaController::class, 'index'])->name('index');
    Route::get('/detail/{slug}', [BeritaController::class, 'show'])->name('show');
});

Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/tkpsda', [HomeController::class, 'tkpsda'])->name('tkpsda');
Route::get('/agenda_kepala_balai', [AgendaController::class, 'index'])->name('agenda_kepala_balai');

require __DIR__ . '/web-backpanel.php';