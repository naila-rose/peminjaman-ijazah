<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('admin/login');
});
// Route::get('index', function () {
//     return view('admin/index');
// });

// Route::get('login', function () {
//     return view('admin/login');
// });
// Route::get('login', [LoginController::class, 'index']);
// Route::get('register', [RegisterController::class, 'index']);
// Route::post('register', [RegisterController::class, 'store']);

Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'register_action'])->name('register.action');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'login_action'])->name('login.action');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('login', [LoginController::class, 'index']);
// Route::post('login', [LoginController::class, 'authenticate']);
// Route::post('logout', [LoginController::class, '__invoke'])->name('logout');

// Route::get('register', [RegisterController::class, 'index']);
// Route::post('register', [RegisterController::class, 'store']);

Route::get('index', [StudentController::class, 'dashboard']);

// Route::get('register', function () {
//     return view('admin/register');
// });

Route::get('student', [StudentController::class, 'index']);
Route::get('student-add', [StudentController::class, 'create']);
Route::post('students', [StudentController::class, 'store']);
Route::get('student/{id}/edit', [StudentController::class, 'edit']);
Route::put('student/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']);

Route::get('main', function () {
    return view('admin/layouts/main');
});

Route::get('/master', function () {
    return view('user.master');
});

// Route::get('/masterr', function () {
//     return view('masterr');
// });


 Route::get('/second', function () {
    return view('user.second');
});

Route::get('/tri', function () {
    return view('user.tri');
});

Route::get('/insert-sql', [MahasiswaController::class,'insertSql']);

Route::get('/user.master', [MahasiswaController::class,'getView']);
