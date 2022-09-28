<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MediaController::class, 'index'])->name('media');

Route::post('/add', [CustomerController::class, 'store'])->name('mediastore');

Route::get('/admin', [RegisteredUserController::class, 'editAdmin']);

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/customers', [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/customers');

require __DIR__ . '/auth.php';
