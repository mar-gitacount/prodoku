<?php
namespace php\class_set;
require '../../vendor/autoload.php';
// jsonファイルを放り込めば変換してくれるクラス
// 役割はjsonをcsvに変換するだけ!!
// 実際に変換するクラスはNowJsonCsvPathクラスで実行する。
// this?でインスタンスのcsvファイルを設定する、、
class JsonChangetoCsv {
    // パスを渡す
    public static function jsonAndcsvPath($json,$csv){
        // メモリに読み込む
        ini_set("memory_limit","1000M");
        // 渡ってきたファイルをfile_get_contentで取得できるかチェックする。
    }
}
// use App\Cron\;
// class JsonChangetoCsv{
//     // configファイルを読み込む処理。
//     $CronConfig = CronConfig;
//     public $config_file = "";
// }
