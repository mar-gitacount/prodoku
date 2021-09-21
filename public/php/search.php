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
// echo json_encode($user);
// echo $csv;
// dd($csv);

function create_response($user,$csv,$isIn){
    $result = [
        'user' => $user,
        'csv' => $csv,
        'isIn' => $isIn
    ];
    return $result;
}
if(preg_match("/".$csv."/",$user)){
    echo json_encode(create_response($user,$csv,true));
    exit();
}else{
    if($csv==""){
        echo json_encode(create_response($user,$csv,false));
        exit();
    }
    echo json_encode(create_response($user,$csv,false));
    exit();
}
