<?php

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
//topのページのルーティング
Route::get('/', function () {
    return view('top');
});


//タレコミページのルーティング
Route::get('/tarekomi', [App\Http\Controllers\tarekomiController::class, 'index'])->name('tarekomi');
Route::post('/tarekomi', [App\Http\Controllers\tarekomiController::class, 'store'])->name('store');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/biasfaq', [App\Http\Controllers\HomeController::class, 'index'])->name('biasfaq');
