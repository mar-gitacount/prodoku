<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use App\Admin\Controllers\HomeController;
use App\Models\Tarekomi;
use GuzzleHttp\Client;
use Tests\TestCase;
require '../../vendor/autoload.php';
// Guzzleのインスタンスを作成
$client = new Client;
// 本番かどうかでパラメータを変換する。
// if (config('app.env')== "production") {
//     $url = 'https://prodoku.herokuapp.com/api/alldelte';
// } else {
//     $url = 'http://local_prodoku/api/alldelete';
// }
// api通信
$response = $client -> request('GET', 'https://prodoku.herokuapp.com/api/alldelte');
$response_body = (string) $response->getBody();
echo $response_body;
