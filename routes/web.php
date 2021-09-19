<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Tarekomi;
use App\Http\Controllers\TarekomiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\FormatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
Route::get('/{any}', function() {
    return view('top');
})->where('any', '.*');


Route::get('/', function () {
    // $tarekomi = Tarekomi::findOrFail(1);
    // $tarekomi = $tarekomi->message;
    // $tarekomis = DB::table('tarekomis')->orderBy('created_at', 'desc')->paginate(10);
    //dd($tarekomis);
    return view('top');
    return view('top', compact('tarekomis'));
    //return view('top', ['tarekomis' => $tarekomis]);
});

// Route::get('/example', function(){

// });

//タレコミページのルーティング
// Route::get('/tarekomi', [App\Http\Controllers\TarekomiController::class, 'index'])->name('tarekomi');
// Route::post('/tarekomi', [App\Http\Controllers\TarekomiController::class, 'post'])->name('post');
// Route::get('/tarekomi/confirm', [App\Http\Controllers\TarekomiController::class, 'confirm'])->name('confirm');
// Route::post('/tarekomi/confirm', [App\Http\Controllers\TarekomiController::class, 'store'])->name('store');
// Route::get('/tarekomi/thanks', [App\Http\Controllers\TarekomiController::class, 'thanks'])->name('thanks');
// Route::get('/test', [App\Http\Controllers\TarekomiController::class, 'test'])->name('test');
// Route::get('/test/{tarekomi}', [App\Http\Controllers\TarekomiController::class, 'testarticle'])->name('testarticle');
// Route::post('/test', [App\Http\Controllers\TarekomiController::class, 'upload'])->name('upload');

// Route::get('/format',[FormatController::class, 'index'])->name('update');

//Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::resource('update', UpdateController::class);
Route::get('/youtubebase',function(){
    return view('youtubeviews.japan.HpdO5Kq3o',["items" => "testyoutube"]);
});
// Route::get('/biasfaq', [App\Http\Controllers\HomeController::class, 'index'])->name('biasfaq');
