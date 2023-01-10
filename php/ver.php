<?php
$vercode = $_POST['vernumber'];
session_start();
$checkstr=$_SESSION['string'];
if(strcasecmp($vercode,$checkstr)==0){
    $success['result'] = 'ok';
    unset($_SESSION['string']);
}else if($vercode == null){
    $success['result'] = 'error';
    unset($_SESSION['string']);
}
else{
    $success['result'] = 'error';
    unset($_SESSION['string']);
}
echo json_encode($success);
?>