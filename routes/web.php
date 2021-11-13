<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

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
    Route::get('/dashboard/manageinventory', [HomeController::class, 'manageinventory'])->name('dashboard.manageinventory');
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
});


require __DIR__.'/auth.php';
