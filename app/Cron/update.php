<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use App\Admin\Controllers\HomeController;
use App\Models\Tarekomi;
use GuzzleHttp\Client;
use Tests\TestCase;
use App\Cron\EditandDelete;
require '../../vendor/autoload.php';
// Guzzleのインスタンスを作成
$client = new Client;
// api通信
// "GET", [アクセスしたいURL])
$method = 'POST';
$token = "fdafdasfhewiafds";
// $url = "http://local_prodoku/api/alldelete?token=${token}";
$url = "https://hokusaimanga.herokuapp.com/api/alldelete?token=${token}";
// 本番環境の場合
// if (App::environment(['production', 'staging'])) {
//     $url = "https://prodoku.herokuapp.com/?token=${token}";
// }else{
//     $url = "http://local_prodoku/api/alldelete?token=${token}";
// }
// $url = (App::environment(['production']))?"https://prodoku.herokuapp.com/?token=${token}":"http://local_prodoku/api/alldelete?token=${token}";
$params = [
    'form_params' =>
    [
        "name" => 'token'
    ]
];
// APIリクエスト
$response = $client -> request($method,$url,$params);

// APIで帰ってきた値をセットしている。
// echo $response -> getStatusCode();
// echo $response -> getHeader('content-type')[0];
// echo $response -> getBody();
$posts = $response -> getBody();
$posts2 = json_decode($posts,true);
var_dump($posts2);
 //jsonで画像を呼び出す。
EditandDelete::jsonserch();
