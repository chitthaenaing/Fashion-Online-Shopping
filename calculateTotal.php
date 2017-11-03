<?php 
session_start();
$itemId = $_GET['itemid'];
$qty = $_GET['qty'];
$price = $_GET['price'];


$i=0;


$itemPrice = $qty*$price;


echo $itemPrice;

?>