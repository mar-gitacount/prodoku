<?php

require '../../vendor/autoload.php';
// フロント側のデータ
$csv = $_POST['csv_value'];
$user = $_POST['user_input'];
// $csv = "/".$csv."/";
// if($csv == ""){
//     $result = [
//         'empty' => "空文字"
//     ];
//     return $result;
// }
// echo json_encode(__FILE__);
// echo $user;
// echo $csv;
function create_response($val, $isIn){
    $result = [
        'text' => $val
    ];
    return $result;
}

echo json_encode(create_response($user,true));
if(preg_match($csv,$user)){
    return true;
}else{
    return false;
}
// echo $user;
// echo $csv;
