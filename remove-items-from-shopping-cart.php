<?php
	session_start();
	require 'functions.php';
	// $conn = connect();
	$productId = $_GET['productId'];
	foreach ($_SESSION['cart'] as $key => $value) {
		if($value['item_id'] == $productId) {
			unset($_SESSION['cart'][$key]);
			if(count($_SESSION['cart']) < 1) {
				unset($_SESSION['cart']);
			}
		} 	
	}
	

?>