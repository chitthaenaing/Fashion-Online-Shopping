<?php 
require '../functions.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//To get DB Connection
	$conn = connect();

	$query = 'Delete from products where item_id=:id';
	$binding = array(':id'=>$id);
	$stmt = $conn ->prepare($query);
	$stmt->execute($binding);
	header("location:viewallprouducts.php");
}

?>