<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImageController;
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
Route::get('/dashboard/portfolio/edit_{idportfolio}', [PortfolioController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/portfolio/edit');
Route::post('/dashboard/portfolio/update_{idportfolio}', [PortfolioController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/portfolio/update');



Route::get('/dashboard/service', [ServiceController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/service');
Route::get('/dashboard/service/create', [ServiceController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/service/create');
Route::post('/dashboard/service/add', [ServiceController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/service/add');
Route::get('/dashboard/service/edit_{idservice}', [ServiceController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/service/edit');
Route::post('/dashboard/service/update_{idservice}', [ServiceController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/service/update');


Route::get('/dashboard/image', [ImageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/image');
Route::get('/dashboard/image/create', [ImageController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/image/create');
Route::post('/dashboard/image/add', [ImageController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/image/add');


Route::post('/dashboard/account/add_{iduser}', [AccountController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/account/add');
Route::get('/dashboard/account', [AccountController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/account');
Route::get('/dashboard/admin_{iduser}', [UserController::class, 'updateAdmin'])->name('dashboard/updateAdmin');





Route::get('/dashboard/customers/delete_{idcustomer}', [CustomerController::class, 'deleteCustomer'])->name('dashboard/customers/delete');

Route::get('/dashboard/portfolio/delete_{idcustomer}', [PortfolioController::class, 'destroyPortfolio'])->name('dashboard/portfolio/delete');

Route::get('/dashboard/service/delete_{idcustomer}', [ServiceController::class, 'destroyService'])->name('dashboard/service/delete');

Route::get('/dashboard/delete_{iduser}', [UserController::class, 'deleteUser'])->name('dashboard/deleteUser');

Route::get('/dashboard/user_{iduser}', [UserController::class, 'updateUser'])->name('dashboard/updateUser');

require __DIR__ . '/auth.php';
