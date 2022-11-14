<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\PersonController;

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
Route::get('index', function () {
    return view('admin/index');
});
Route::get('login', function () {
    return view('admin/login');
});
Route::get('register', function () {
    return view('admin/register');
});
Route::resource('student', StudentController::class);
Route::get('student-add', [StudentController::class, 'create']);
Route::POST('students', [StudentController::class, 'store']);
Route::PUT('student/{id}', [StudentController::class, 'update']);
Route::get('student-delete/{id}', [StudentController::class, 'delete']);
Route::delete('student-destroy/{id}', [StudentController::class, 'delete']);
// Route::get('student/{id}', [StudentController::class, 'edit']);

Route::get('main', function () {
    return view('admin/layouts/main');
});

Route::get('/master', function () {
    return view('user.master');
});

// Route::get('/masterr', function () {
//     return view('masterr');
// });

 Route::get('/login', function (){
    return view('user.login');
 });

 Route::get('/second', function () {
    return view('user.second');
});

Route::get('/tri', function () {
    return view('user.tri');
});

Route::get('/insert-sql', [MahasiswaController::class,'insertSql']);

Route::get('/user.master', [MahasiswaController::class,'getView']);
