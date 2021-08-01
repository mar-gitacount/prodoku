<?php
use GuzzleHttp\Client;
use Illuminate\Http\Request;
require '../../vendor/autoload.php';
$client = new Client;
$token = '2c40e1503301da44cb2e5edeee9a72b1f4ff2956';
$result = $client->request('GET', 'https://qiita.com/api/v2/items?page=1&per_page=100', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);
$response_body = (string) $result->getBody();
$decode_res = json_decode($response_body);
$filename = 'testmemo.txt';
foreach ($decode_res as $res_data) {
    //$res_data->url;でurlを取得できる。$res_dataで全ての内容が取得できる。
    $url = $res_data->url;
    //file_put_contents($filename,$url);
    //echo $url;
    // $res_data->url; url取得
    // $res_data->title;　タイトル取得
    // $res_data->body; 本文取得
    $object = $res_data->body;
    file_put_contents($filename,$object);
    echo $object;
}
