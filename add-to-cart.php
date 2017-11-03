<?php
session_start();
require 'functions.php';
$conn = connect();

$itemid=$_GET['id']; //item_id
$page = $_GET['page'];
$itemarray = [];

//To get Products 
$query = 'Select * from products where item_id=:id';
$binding = array(':id'=>$itemid);
$stmt = $conn->prepare($query);
$stmt->execute($binding);

while($row = $stmt->fetch()){
$itemarray['item_id'] = $row['item_id'];
$itemarray['item_name'] = $row['item_name'];
$itemarray['item_code'] = $row['item_code'];
$itemarray['price'] = $row['price'];
$itemarray['item_image'] = $row['item_image']; 
$itemarray['discount_price'] = $row['discount_price'];
$itemarray['instock'] = $row['instock'];
$itemarray['categories'] = $row['categories'];
$itemarray['type'] = $row['type'];
}
if (empty($_SESSION['cart']))
{
	$_SESSION['cart'][0]=$itemarray;
}
else {
	$count=count($_SESSION['cart']);
	$_SESSION['cart'][$count]=$itemarray;
}

header("Location:$page.php");
?>