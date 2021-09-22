<?php
namespace App\Http\Middleware;
namespace php\class_set;
use App\Cron;
use App\Cron\CronConfig;

require '../../vendor/autoload.php';
class NowJsonCsvPath{
    public function dir_file_name($name)
    {
        // ここでget_fileしてクラスに渡したい。
        // thisでインスタンス外からアクセスするよ
        $this->name = $name;
    }
}
