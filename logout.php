<?php  
session_start();
session_destroy();
$_SESSION = [];
$checkResult = new stdClass();
$checkResult->response = 'Logout Successfully!';
$checkResult->location = 'index.php';
echo json_encode($checkResult);

?>