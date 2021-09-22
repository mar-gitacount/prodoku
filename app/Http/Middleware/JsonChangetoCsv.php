<?php
namespace App\Http\Middleware;
require '../../vendor/autoload.php';
// jsonファイルを放り込めば変換してくれるクラス
// 役割はjsonをcsvに変換するだけ!!
// 実際に変換するクラスはNowJsonCsvPathクラスで実行する。
// thisでインスタンスのcsvファイルを設定する、、
class JsonChangetoCsv {
    // パスを渡す
    public static function jsonAndcsvPath($json,$csv){
        $f_open_csv = fopen($csv,'a+');
        while($line = fgets($f_open_csv)){
            echo $line;
        }
        $f_get_contet_json = file_get_contents($json);
        $json_encoding = mb_convert_encoding($f_get_contet_json,'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $json_list = json_decode($json_encoding,true);
        // jsonファイルを回してcsvに書き込む
        foreach ($json_list as $fields){
            fputcsv($f_open_csv, $fields);
        }
        fclose($f_open_csv);
        return;
        ini_set("memory_limit","1000M");
        // 渡ってきたファイルをfile_get_contentで取得できるかチェックする。
    }
}
