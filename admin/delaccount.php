<?php 
require '../functions.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//To get DB Connection
	$conn = connect();

	$query = 'Delete from customer_accounts where customer_acc_id=:id';
	$binding = array(':id'=>$id);
	$stmt = $conn ->prepare($query);
	$stmt->execute($binding);
	header("location:useraccount.php");
}

?>