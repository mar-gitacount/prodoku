<?php
namespace App\Cron;
use App\Models\Tarekomi;
class EditandDelete {
    public static function jsonserch(){
        $week = [
            'sunday', //0
            'monday', //1
            'tuesday', //2
            'wednesday', //3
            'thursday', //4
            'friday', //5
            'saturday', //6
        ];
        // 曜日取得する。
        $today = $week[date('w')];
        $date = date("w");
        echo $date;
        // jsonファイルから読み込んでその数だけforeachで回してdb更新する。HokusaiDayOfWeekjsonsフォルダ内のファイルを検索して本日のファイルを探す。
        $pass = "../../resources/json/HokusaiDayOfWeekjsons/${today}.json";
        $json = file_get_contents($pass);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        var_dump($arr);
    }
}
