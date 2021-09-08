<?php
namespace App\Cron;
use GuzzleHttp\Client;
use App\Models\Tarekomi;
use Illuminate\Support\Facades\Config;
use PHPUnit\Util\Json;
require '../../vendor/autoload.php';
// ランダムで読み込むjsonファイルと吐き出すjsonファイルが読み込まれる。
class Roundomjsonchoice {
    // 指定のファイルをランダムで取得するメソッド
    public static function roundomserch(){
        $config = include "../Cron/config.php";
        $rondomjsonsdir = $config['rondomjsonsdir'];
        $readviewjson = $config['readviewjson'];
        $readviewupdatejson = $config['readupdatetimejson']; 
        // 一旦jsondecodeしてmainview.jsonファイル内の配列にアクセスできるようにする。
        $readviewjson_decode = Roundomjsonchoice::jsondecode($readviewjson);
        Roundomjsonchoice::relesejson($rondomjsonsdir, $readviewjson);
        Roundomjsonchoice::readview_jsontimeupdate($readviewupdatejson);
    }
    // ランダムで取得したjsonファイのデータを読み込むjsonファイルを呼び出すメソッド、今回はmainviewread.json
    public static function relesejson($rondomjsonsdir,$readviewjson){
        // ディレクトリ取得する。
        $files = glob("$rondomjsonsdir/*.*");
        $readviewjsonArray = [];
        // ファイル数だけforeachで回してファイル内をランダムな数字で抽出する。
        foreach($files as $file){
            // jsonファイルを取得する。
            // 各jsonファイルを読み込んでデコードする。
            $arr = Roundomjsonchoice::jsondecode($file);
            //jsonファイル内の配列数を取得してランダムに5個取得し、配列に格納する。
            $numbers=[];
            // 0~4の5回ランダムなオブジェクトを取得する。
            while(count($numbers) <= 4){
                // 10個値があるが、0~9までの10なので-1で9にする。
                $rundom_arr = mt_rand(0,count($arr)-1);
                if(!in_array($rundom_arr,$numbers)){
                    // array_push($numbers,$rundom_arr);
                    echo $rundom_arr."\n";
                    $numbers[] = $rundom_arr;
                    // jsonファイルのn(ランダム)番目値が代入されている。
                    $arrrondomobject=$arr[$rundom_arr];
                    //配列をjson型に値は日本語に変換。
                    // $arrrondomobjectencode = json_encode($arrrondomobject,JSON_UNESCAPED_UNICODE);
                    // Roundomjsonchoice::jsonfilearraydappend($readviewjson,$arrrondomobjectencode);
                    $readviewjsonArray[] = json_encode($arrrondomobject,JSON_UNESCAPED_UNICODE);
                }
            }
            echo "-----\n";
        }
        // jsonファイルに入れ込む配列に「段落」と「,」を入れ込む。
        $readviewjsonArray = implode(",\n",$readviewjsonArray);
        file_put_contents($readviewjson,"[\n", LOCK_EX);
        file_put_contents($readviewjson,$readviewjsonArray,FILE_APPEND|LOCK_EX);
        file_put_contents($readviewjson,"\n]",FILE_APPEND|LOCK_EX);
    }
    // jsonファイル内の配列にアクセスする関数。
    public static function jsonfilearraydappend($jsonaccessfile,$appendobject) {
        $getfile=file_get_contents($jsonaccessfile);
        echo $getfile;
        // file_put_contents($getfile,$appendobject);
    }
    // jsonファイルをデコードして返す関数。
    public static function jsondecode($decodefile){
        // jsonファイルを取得する。
        $json = file_get_contents($decodefile,true);
        //jsonファイルの中身を日本語にエンコードする。
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        // 配列に変換する。
        $arr = json_decode($json,true);
        return $arr;
    }
    public static function readview_jsontimeupdate($readupdatetime){
        // jsonデコードする関数を呼び出して、その帰ってきた値を調整する。
        $updatejsondecodearr = Roundomjsonchoice::jsondecode($readupdatetime);
        // 時間を取得する。
        date_default_timezone_set('Asia/Tokyo');
        $updatetime = date("Y/m/d H:i:s");
        $updatejsondecodearr[0][array_keys($updatejsondecodearr[0])[0]]=$updatetime;
        $update_timeresurt_encode = json_encode($updatejsondecodearr, JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT);
        file_put_contents($readupdatetime,$update_timeresurt_encode);
        return;
    }
}
