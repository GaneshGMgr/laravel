<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

// Route::group(['middleware'=>"web"],function(){
//     Route::get('/', [AuthController::class,'index'])->name('auth.login');
//     Route::post('/user/save', [AuthController::class,'save'])->name('user.save');
//     Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
// });



// login
Route::get('/', [AuthController::class,'index'])->name('auth.login');
Route::post('/user/save', [AuthController::class,'save'])->name('user.save');
Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

// register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/user/register', [AuthController::class, 'Userregister'])->name('user.register');

Route::get('/student/list', [StudentController::class, 'index'])->name('student.index');
Route::get('/add/student', [StudentController::class, 'add'])->name('student.add');

Route::post('/student/save', [StudentController::class, 'saveStudent'])->name('student.store');

//books
Route::get('/book/list',[bookController::class, 'index'])->name('book.index');
Route::get('/addbook',[bookController::class, 'addBook'])->name('book.addBook');

Route::post('/addbook',[bookController::class,'formdata'])->name('bookadd');

