<?php
namespace App\Cron\Youtube;
require '../../vendor/autoload.php';
use Google_Client;
use Google_Exception;
use Google_Service;
use Google_Service_Exception;
use Google_Service_YouTube;

//APPKeyの取得。
define("API_KEY","AIzaSyAC_FprdBoHSKAiTVkTDMEbiVDES4SjA84");
// 取得数
 // Googleへの接続情報のインスタンスを作成と設定
$client = new Google_Client();
$client->setDeveloperKey(API_KEY);
$youtube = new Google_Service_YouTube($client);

$keyword = "スカイツリー";
if( isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
}
// パラメータ$paramesを配列で作る。
// paramesに各種パラメータを入れる。

// 検索内容の文字列格納
$params['q'] = $keyword;
//検索タイプvideoにする。
$params['type'] = 'video';
// 件数を入れる。
$params['maxResults'] = 10;

//検索文字を本来の文字に戻す。
$keyword = htmlspecialchars($keyword);

// videos配列。最終的にforで回す。
$videos = [];

try {
    // $paramsが配列なのでlistsearchで取得
    $searchResponse = $youtube->search->listSearch('snippet',$params);
    //echo $searchResponse;
    array_map(function($searchResult) use (&$videos){
        $videos[] = $searchResult;
    },$searchResponse['items']);
} catch (Google_Service_Exception $e) {
    echo htmlspecialchars($e->getMessage());
    exit;
} catch (Google_Exception $e) {
    echo htmlspecialchars($e->getMessage());
    exit;
}

foreach($videos as $video){
    echo $video['snippet']['title']."¥n";
    echo '<img src="' . $video['snippet']['thumbnails']['default']['url']. '" />';
}

