<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarekomiapiController;
use App\Http\Controllers\QitaapiController;
use SebastianBergmann\Environment\Console;
use App\Models\Tarekomi;
use App\Cron\EditandDelete;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tarekomiapi', TarekomiapiController::class);

// Qiitaのapi取得のためのルーティング
Route::resource('qiitaapi', QitaapiController::class);
// 引数にpageを渡す。
//Route::get('topdata', TopController::class)->name('topdata');

Route::get('example',function(){
    $test = "test!";
    return $test;
});
Route::get('tarekomiget',[App\Http\Controllers\TarekomiController::class, 'tarekomigetapi']);

Route::group(['prefix' => 'inquiry', 'as' => 'inquiry', 'middleware' => 'forceSsl'], function(){ // https
    
});


Route::get('topdata/{page_name_resurt}',function(Request $request){
    $requestparams = $request -> recode;
    // 呼び出すコントローラ内でyoutubeapiを投げて返す。
    // コントローラ内で返す値id←これを使ってサムネイルや、タイトルを取得する。
    return $requestparams;
});

Route::post('alldelete',function(Request $request){
    // update.phpから渡されているパラメータを代入している。
    // $token =  $request -> input('token');
    $tokenawase = "fdafdasfhewiafds";
    $params = $request -> input('token');
    if($params === $tokenawase){
        //全て削除する。
        Tarekomi::query()->delete();
        //jsonで画像を呼び出す。
        return response() -> json(['deletecoment' => $params]);
    }
    else{
        $params = "NG";
        return response() -> json(['deltecoment' => $params]);
    }
    EditandDelete::jsonserch();
});

// YoutubeviewControllerを作成。urlやタイトルを出力するためのコントローラ。このコントローラ内で全て処理する。
// SELECT カラム名 FROM テーブル名;
// likecountでソートする。10件取得する。↑は非同期にして別処理にする。select * likecount where = sort 10 && title
//select title count(10) from youtbeapisave order by likecount desc;←10件取得したい。
//SELECT * FROM menus WHERE category = '洋食' ORDER BY name LIMIT 1;
// 例↓↓
//SELECT * FROM youtubeapisave WHERE title ORDER BY likecount desc && LIMIT 10;


// Route::get('tarekomiapi',[App\Http\Controllers\TarekomiapiController::class, 'index']);

// Route::group(['middleware' => ['api']], function(){
//     Route::resource('tarekomiapi', 'TarekomiapiController');
// });
