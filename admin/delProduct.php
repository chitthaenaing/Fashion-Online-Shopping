<?php 
require '../functions.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//To get DB Connection
	$conn = connect();

	if($conn) {
		$query = "Update products SET status=0 where item_id='$id'";
		get($query,$conn);
		header("location:viewallproducts.php");
	}
}

?>