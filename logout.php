<?php  
session_start();
session_destroy();
$_SESSION = [];
echo "<script>alert('Logout Successfully!');window.location.href='index.php';</script>";

?>