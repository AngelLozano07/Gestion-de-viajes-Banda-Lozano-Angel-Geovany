<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\destinoController;
use App\Http\Controllers\hospedajeController;
use App\Http\Controllers\usuarioController;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PdfController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('destinos', destinoController::class);
    Route::resource('hospedajes', hospedajeController::class);
    Route::resource('usuarios', usuarioController::class);
    Route::post('/import', [usuarioController::class, 'import']);
    Route::get('/pdf/descargar', [PdfController::class, 'descargar'])->name('pdf.descargar');
    Route::get('/pdf/ver', [PdfController::class, 'ver'])->name('pdf.ver');
    Route::get('/pdf/guardar', [PdfController::class, 'guardar'])->name('pdf.guardar');
});

require __DIR__.'/settings.php';
