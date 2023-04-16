<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebcamController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Master\MasterController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('admin/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth.login')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/index', [StudentController::class, 'dashboard']);
    
    Route::get('/student', [StudentController::class, 'index']);
    Route::get('/student-add', [StudentController::class, 'create']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
    Route::delete('/student/{id}', [StudentController::class, 'destroy']);
    
    Route::get('/main', function () {
        return view('admin/layouts/main');
    });

    Route::get('/riwayat', [StudentController::class, 'riwayat']);

    Route::middleware(['superadmin'])->group(function () {
        Route::resource('/admin', EmployeeController::class);
    });
});

Route::get('/master', [MasterController::class, 'index']);
Route::post('/master', [MasterController::class, 'checkNim']);
Route::get('/second', [MasterController::class, 'afterCheckNIM']);
Route::post('/second', [MasterController::class, 'secondPage']);
Route::get('/third', [MasterController::class, 'afterInputData']);
Route::post('/third', [MasterController::class, 'dataPeminjam']);

// store photo peminjam
Route::post('/webcam', [MasterController::class, 'store'])->name('webcam.capture');