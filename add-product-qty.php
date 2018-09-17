<?php 
	session_start();
	$arrayQty = json_decode(stripslashes($_GET['productQuantities']));
	foreach($arrayQty as $index => $value) {
		if($_SESSION['cart'][$index]) {
			$_SESSION['cart'][$index]['qty'] = $value;	
		}
		
	}

	// echo json_encode($_SESSION['cart']);
?>