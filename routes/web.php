<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DompetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes(
    ['register' => false]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route Dompet
Route::get('/dompet', [DompetController::class, 'index'])->name('dompet.index');
Route::get('dompet/create', [DompetController::class, 'create'])->name('dompet.create');
Route::get('dompet/edit/{id}', [DompetController::class, 'edit'])->name('dompet.edit');
Route::get('dompet/show/{id}', [DompetController::class, 'show'])->name('dompet.show');
Route::post('dompet/store', [DompetController::class, 'store'])->name('dompet.store');
Route::put('dompet/update/{id}', [DompetController::class, 'update'])->name('dompet.update');

//Route Dompet Active NonActive
Route::post('dompet/inActive/{id}', [DompetController::class, 'inActive'])->name('dompet.inActive');
Route::post('dompet/Active/{id}', [DompetController::class, 'Active'])->name('dompet.Active');


//Route Dompet
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

//Route Category Active NonActive
Route::post('category/inActive/{id}', [CategoryController::class, 'inActive'])->name('category.inActive');
Route::post('category/Active/{id}', [CategoryController::class, 'Active'])->name('category.Active');
