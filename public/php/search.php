<?php

use SebastianBergmann\Environment\Console;

require '../../vendor/autoload.php';
// フロント側のデータ
$csv = $_POST['csv_value'];
$user = $_POST['userinput'];
// $csv = "/".$csv."/";
// if($csv == ""){
//     $result = [
//         'empty' => "空文字"
//     ];
//     return $result;
// }
echo __FILE__;
echo $user;
$result = [
    'empty' => "空文字"
];
return $result;

if(preg_match($csv,$user)){
    return true;
}else{
    return false;
}
// echo $user;
// echo $csv;
