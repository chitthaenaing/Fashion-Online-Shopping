<?php
session_start();
require 'functions.php';

$conn = connect();
$totalPrice = 0;
$couponPrice = 0;
if(isset($_POST['coupon_use'])){
	$couponCode = $_POST['coupon_code'];
	$query = "Select * from coupon where coupon_code='$couponCode'";
	$rs = get($query,$conn);
	$rowCount = $rs->rowCount();
	if(!$rowCount) echo "<script>alert('Your Coupon Code is invalid');</script>";
	else{
		while($row=$rs->fetch()){
			$couponAmount = $row['coupon_amount'];
			$couponPrice=$couponAmount;
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DreamHouse</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/custom.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
</head>
<body>
	<?php include 'navbar.php'; ?>
	 
	<div class="container">
		
		<div class="panel panel-default" style="margin-top:6%">
			<div class="panel-heading">
				<h1>View Cart</h1>
			</div>

			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Total</th>
						</tr>
					</thead>

					<tbody>
						<form action="#" method="POST">
						<?php foreach($_SESSION['cart'] as $row) { ?>
						<tr>
							<td>
								<img src="admin/photo/<?=$row['item_image']; ?>" width="150px" height="180px">
								<span><?= $row['item_name']; ?> 
								
							</td>
							
							<td>
								<select onChange="setQty(this.value,
									<?=($row['discount_price']>0)?$row['discount_price']:$row['price']; ?>,<?=$row['item_id']; ?>)">
									<?php for($i=1;$i<=10;$i++): ?>
									<option><?= $i; ?></option>
									<?php endfor; ?>
								</select>
							</td>

							<td>
								$ <?= $pr = ($row['discount_price']>0)?$row['discount_price']:$row['price'];?>
							</td>

							<td>
								$
								<span class='total' id='total<?= $row['item_id']; ?>'>
									<?=$pr;?>	
								</span>
															  
							</td>

						</tr>
						<?php $i++; } ?>

						<tr>
							<td>
								<div class="form-group">
									<label for="coupon">Enter Your coupon Code Here</label>
									<input type="text" name="coupon_code" class="form-control" id="coupon">
								</div>
								<button class="btn btn-md btn-primary" name="coupon_use">Use</button>
								
							</td>

							<td>
								
							</td>
						
							<td>
								<label>Total</label>
							</td>

							<td>
								
								$ <span id="priceTotal">
									<?php 
									foreach($_SESSION['cart'] as $price){
										$totalPrice+=($price['discount_price']>0)?$price['discount_price']:$price['price'];
									}
									echo $totalPrice;
									?>
								</span>
								
							</td>
						</tr>

						<tr>
							<td></td>
							<td>
							<a href="checkout.php" class="btn btn-md btn-info">Checkout</a>
							</td>
							<td>Sub Total</td>
							<td>$ 
							<?= (isset($couponPrice))?$totalPrice-$couponPrice:""; ?>
							</td>
						</tr>
						
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script>
	var totalPrice = 0;

	function setQty(qty,val,itemid)
	{
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{	

			document.getElementById("total"+itemid).innerHTML=this.responseText;
			
			
			// document.getElementById("priceTotal").innerHTML=totalPrice;
			
		}
	}
	xmlhttp.open("GET","calculateTotal.php?qty="+qty+"&&price="+val+"&&itemid="+itemid,true);
	xmlhttp.send();
	}
	
</script>

	  
</body>
</html>