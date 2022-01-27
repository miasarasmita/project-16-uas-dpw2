<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
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

Route::get('template', function () {
    return view('template');
});

// Route::get('login', [AuthController::class, 'showlogin'] );

// Route::get('admin/beranda', [HomeController::class, 'showberanda']);
// Route::get('admin/kategori', [HomeController::class, 'showkategori']);
// Route::get('admin/user', [HomeController::class, 'showuser']);
// Route::get('admin/produk', [ProdukController::class, 'index']);
// Route::get('admin/produk/create', [ProdukController::class, 'create']);
// Route::post('admin/produk', [ProdukController::class, 'store']);
// Route::get('admin/produk/{produk}', [ProdukController::class, 'show']);
Route::get('admin/produk/{produk}/edit', [ProdukController::class, 'edit']);
Route::put('admin/produk/update/{produk}', [ProdukController::class, 'update']);
// Route::delete('admin/produk/{produk}', [ProdukController::class, 'destroy']);
// Route::post('admin/produk/filter', [ProdukController::class, 'filter']);

// Route::prefix('admin')->group(function(){
//     Route::resource('produk', ProdukController::class);
// });


// Route::get('admin/user', [UserController::class, 'index']);
// Route::get('admin/user/create', [UserController::class, 'create']);
// Route::post('admin/user', [UserController::class, 'store']);
// Route::get('admin/user/{user}', [UserController::class, 'show']);
// Route::get('admin/user/{user}/edit', [UserController::class, 'edit']);
// Route::put('admin/user/update/{user}', [UserController::class, 'update']);
// Route::delete('admin/user/{user}', [UserController::class, 'destroy']);

// Route::get('login', [AuthController::class, 'showlogin'] );
// Route::post('login', [AuthController::class, 'loginProcess'] );
// Route::post('logout', [AuthController::class, 'logout'] );


// CRUD
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
    Route::get('dashboard', [HomeController::class, 'Showberanda']);
    Route::post('produk/filter', [ProdukController::class, 'filter']);
});

Route::get('dashboard/{status}', [HomeController::class, 'Showberanda']);

// CRUD
// login as Pengguna


Route::get('login', [AuthController::class, 'showlogin']) -> name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// client

Route::get('home', [ClientController::class, 'showhome'] );
Route::get('products', [ClientController::class, 'showproducts'] );
Route::get('about', [ClientController::class, 'showabout'] );
Route::get('client', [ClientController::class, 'showclient'] );
Route::get('contact', [ClientController::class, 'showcontact'] );
Route::get('checkout', [ClientController::class, 'checkout'] );
Route::post('products/filter', [ClientController::class, 'filter']);
Route::post('products/filter2', [ClientController::class, 'filter2']);
Route::get('detail/{produk}', [ClientController::class, 'showdetail']);


//alamat
Route::get('alamat',[HomeController::class, 'showAlamat'] );

// setting control

Route::get('cart', [ClientController::class, 'cart']);