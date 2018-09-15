<?php
	session_start();
	require 'functions.php';
	$conn = connect();
	// header('Content-type: application/json');

	$productId = $_GET['productId'];
	$productQty = $_GET['quantity'];
	if($conn) {
		$query = "Select instock from products where item_id = $productId"	;
		$rs = get($query, $conn);

		$get_instock = $rs->fetch();
		
		if($get_instock[0] >= $productQty) {
			$check = true;
		}else {
			$check = false;
		}
		$data = new stdClass();
		$data->check = $check;
		$data->instock = $get_instock[0];
	
		echo json_encode($data);

	}

?>