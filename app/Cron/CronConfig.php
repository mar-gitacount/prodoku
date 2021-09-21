<?php
namespace App\Cron;
// Readme
// このファイルはupload.jsonで利用する読み込み先や出力先のjsonファイルの設定をする。
// config.php => jsonファイル名などで設定する。
require '../../vendor/autoload.php';
Class CronConfig {
    public static $config = [
        // ランダムで読み込むjsonファイル群。
        'rondomjsonsdir' => "../../resources/json/HokusaiDayOfWeekjsons/gunlejsonfiles",
        // 出力先jsonファイル。今回の場合はmainviewread.jsonファイル。
        'readviewjson' => "../../resources/json/mainviewread.json",
        // 更新時間記載されているjsonファイル
        'readupdatetimejson' => "../../resources/json/HokusaiDayOfWeekjsons/update_yyyymmdd.json",
        //検索csvファイル群
        'hokusaimanga_csv' => "/csv/hokusaimanga.csv",
        'news_csv' => "/csv/news.csv"
    ];

}
