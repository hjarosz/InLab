<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/', function(){
    return view('home.welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard/manageusers', [HomeController::class, 'manageusers'])->name('dashboard.manageusers');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::patch('/item/{item}', [ItemController::class, 'update'])->name('item.update');
});

Route::group(['middleware' => ['auth', 'role:admin|user']], function(){
    Route::get('/item/rent/{item}', [ItemController::class, 'rent'])->name('item.rent');
});

Route::group(['middleware' => ['auth', 'role:admin|user']], function(){
    Route::get('/item/return/{item}', [ItemController::class, 'return'])->name('item.return');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('user/delete/{user}',[RegisteredUserController::class, 'delete'])->name('user.delete');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('user/edit/{user}',[RegisteredUserController::class, 'edit'])->name('user.edit');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::patch('user/{user}',[RegisteredUserController::class, 'update'])->name('user.update');
});


require __DIR__.'/auth.php';
