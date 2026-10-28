<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AdminController;

// === HALAMAN UTAMA ===
Route::get('/', function () {
    return view('welcome');
})->name('home');

// === FORMULIR REJISTASAUN ===
Route::get('/registrasaun', [EstudanteController::class, 'create'])->name('registrasaun.create');
Route::post('/registrasaun', [EstudanteController::class, 'store'])->name('registrasaun.store');

// === CEK STATUS REJISTU ===
Route::get('/cek-status', [StatusController::class, 'index'])->name('cek-status');
Route::post('/cek-status', [StatusController::class, 'cek'])->name('cek-status.proses');

// === ADMIN — TAMA & SAI ===
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// === ADMIN — JERE DADUS ===
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/estudantes', [AdminController::class, 'index'])->name('admin.estudantes.index');
Route::get('admin/departamentu/{nome}', [AdminController::class, 'listaDepartamentu'])->name('admin.departamentu');
Route::get('/admin/estudantes/{id}/edit', [AdminController::class, 'edit'])->name('admin.estudantes.edit');
Route::post('/admin/estudantes/{id}/update', [AdminController::class, 'update'])->name('admin.estudantes.update');
Route::delete('/admin/estudantes/{id}', [AdminController::class, 'destroy'])->name('admin.estudantes.destroy');