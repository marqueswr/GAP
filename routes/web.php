<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\DocumentoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/documento-index',[DocumentoController::class,'index'])->name('documento.index');
Route::get('/documento-create',[DocumentoController::class,'create'])->name('documento.create');
Route::post('/documento-store',[DocumentoController::class,'store'])->name('documento.store');
Route::get('/documento-edit/{documento}', [DocumentoController::class, 'edit'])->name('documento.edit');
Route::put('/documento-update/{documento}', [DocumentoController::class, 'update'])->name('documento.update');
Route::delete('/documento-destroy/{documento}', [DocumentoController::class, 'destroy'])->name('documento.destroy');

Route::get('/aluno-index',[AlunoController::class,'index'])->name('aluno.index');
Route::get('/aluno-create',[AlunoController::class,'create'])->name('aluno.create');
Route::post('/aluno-store',[AlunoController::class,'store'])->name('aluno.store');
Route::get('/aluno-edit/{aluno}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno-update/{aluno}', [AlunoController::class, 'update'])->name('aluno.update');
Route::delete('/aluno-destroy/{aluno}', [AlunoController::class, 'destroy'])->name('aluno.destroy');


Route::get('/arquivo-index',[ArquivoController::class,'index'])->name('arquivo.index');
Route::get('/arquivo-index-filtrado',[ArquivoController::class,'filtrado'])->name('arquivo.index.filtrado');
Route::get('/arquivo-create/{parametro?}',[ArquivoController::class,'create'])->name('arquivo.create');
Route::get('/arquivo-show/{arquivo}',[ArquivoController::class,'show'])->name('arquivo.show');
Route::post('/arquivo-store',[ArquivoController::class,'store'])->name('arquivo.store');
Route::get('/arquivo-edit/{arquivo}', [ArquivoController::class, 'edit'])->name('arquivo.edit');
Route::put('/arquivo-update/{arquivo}', [ArquivoController::class, 'update'])->name('arquivo.update');
Route::delete('/arquivo-destroy/{arquivo}', [ArquivoController::class, 'destroy'])->name('arquivo.destroy');
