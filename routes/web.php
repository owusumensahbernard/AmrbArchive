<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

// login page
Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('/', [LoginController::class, 'store'])->name('home');

//registration page
Route::get('register', [RegisterController::class, 'index'])->name('register')
    ->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register');

// loan page
Route::get('loan', [LoanController::class, 'UserLevel'])->name('loan')
->middleware('auth');
Route::post('loan', [LoanController::class, 'SearchLoan'])->name('loan')
    ->middleware('auth');
Route::get('LoanForms', [LoanController::class, 'create'])->name('LoanForms')
    ->middleware('auth');
Route::post('LoanForms', [LoanController::class, 'store'])->name('LoanForms')
->middleware('auth');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout');
