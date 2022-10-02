<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/customers', [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/customers');

Route::get('/dashboard/portfolio', [PortfolioController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/portfolio');

Route::get('/dashboard/portfolio/create', [PortfolioController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/portfolio/create');

Route::post('/dashboard/portfolio/add', [PortfolioController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/portfolio/add');

Route::get('/dashboard/service', [ServiceController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/service');

Route::get('/dashboard/service/create', [ServiceController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/service/create');

Route::post('/dashboard/services/add', [ServiceController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/services/add');

Route::get('/dashboard/admin_{iduser}', [UserController::class, 'updateAdmin'])->name('dashboard/updateAdmin');

Route::get('/dashboard/delete_customer_{idcustomer}', [CustomerController::class, 'deleteCustomer'])->name('dashboard/deleteCustomer');

Route::get('/dashboard/delete_{iduser}', [UserController::class, 'deleteUser'])->name('dashboard/deleteUser');

Route::get('/dashboard/user_{iduser}', [UserController::class, 'updateUser'])->name('dashboard/updateUser');

require __DIR__ . '/auth.php';
