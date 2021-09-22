<?php
namespace App\Http\Middleware;
use App\Cron;
// use App\Cron\CronConfig;

require '../../vendor/autoload.php';
class NowJsonCsvPath {
    // ファイル取得するメソッド
    public function dir_file_name($json,$csv)
    {
        // thisでインスタンスからアクセスする。インスタンスでファイルを設定する。
        $this->json = $json;
        $this->$csv = $csv;
        // csvファイルを空にする。
        if(is_dir($json)){
            $files = glob("$json/*.*");
            // jsonをcsvに変換するstaticにファイルを渡す。
            foreach($files as $file){
                $result = JsonChangetoCsv::jsonAndcsvPath($file,$csv);
            }
        }else{
            $result = JsonChangetoCsv::jsonAndcsvPath($json,$csv);
        }
        // クラス内のローカル変数が返される。
        return $result;
    }
    public function fileResetStart($json,$reset_csv,$reset_after_columns){
        // ファイルの中をリセットする。
        $this->$json = $json;
        $this->$reset_csv = $reset_csv;
        // ファイル内を空にする。
        $f_open_csv = fopen($reset_csv,'a+');
        ftruncate($f_open_csv,0);
        // csvファイルに必要なカラム(第3引数)を差し込む。
        fputcsv($f_open_csv, $reset_after_columns);
        fclose(($f_open_csv));
        // 同じクラスのメソッドを呼び出してファイル作成を始める。
        $this->dir_file_name($json,$reset_csv);
    }
}
