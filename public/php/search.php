<?php

require '../../vendor/autoload.php';
$inputvalue = $_POST['input_val'];
$rsult = [$inputvalue,"test"];
echo json_encode($inputvalue);
