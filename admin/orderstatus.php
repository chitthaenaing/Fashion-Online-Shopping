<?php 
	require '../functions.php';
	$conn = connect();
	$orderid = $_GET['id'];
	$status = $_GET['status'];
	$query = "Update orders SET status=$status, delivered_date=NOW() WHERE order_id=$orderid";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	header("Location:vieworders.php");
?>