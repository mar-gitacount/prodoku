<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Tarekomi;
use App\Http\Controllers\TarekomiController;

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
    // $tarekomi = Tarekomi::findOrFail(1);
    // $tarekomi = $tarekomi->message;
    // $tarekomis = DB::table('tarekomis')->orderBy('created_at', 'desc')->paginate(10);
    //dd($tarekomis);
    return view('top');
    return view('top', compact('tarekomis'));
    //return view('top', ['tarekomis' => $tarekomis]);
});


//タレコミページのルーティング
Route::get('/tarekomi', [App\Http\Controllers\TarekomiController::class, 'index'])->name('tarekomi');
Route::post('/tarekomi', [App\Http\Controllers\TarekomiController::class, 'post'])->name('post');
Route::get('/tarekomi/confirm', [App\Http\Controllers\TarekomiController::class, 'confirm'])->name('confirm');
Route::post('/tarekomi/confirm', [App\Http\Controllers\TarekomiController::class, 'store'])->name('store');
Route::get('/tarekomi/thanks', [App\Http\Controllers\TarekomiController::class, 'thanks'])->name('thanks');
Route::get('/test', [App\Http\Controllers\TarekomiController::class, 'test'])->name('test');
Route::get('/test/{tarekomi}', [App\Http\Controllers\TarekomiController::class, 'testarticle'])->name('testarticle');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/biasfaq', [App\Http\Controllers\HomeController::class, 'index'])->name('biasfaq');
