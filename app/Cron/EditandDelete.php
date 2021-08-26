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
        echo $today;
        // jsonファイルから読み込んでその数だけforeachで回してdb更新する。HokusaiDayOfWeekjsonsフォルダ内のファイルを検索して本日のファイルを探す。
        $pass = "../../resources/json/HokusaiDayOfWeekjsons/${today}.json";
    }
}
