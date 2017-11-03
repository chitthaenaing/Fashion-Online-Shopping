<?php
session_start();
require 'functions.php';

$conn = connect();
$totalPrice = 0;
if(isset($_POST['coupon_use'])){
	$couponCode = $_POST['coupon_code'];
	$query = "Select * from coupon where coupon_code='$couponCode'";
	$rs = get($query,$conn);
	$rowCount = $rs->rowCount();
	if(!$rowCount) echo "<script>alert('Your Coupon Code is invalid');</script>";
	else{
		while($row=$rs->fetch()){
			$couponAmount = $row['coupon_amount'];
			$totalPrice-=$couponAmount;
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
						<?php foreach($_SESSION['cart'] as $row) { ?>
						<tr>
							<td>
								<img src="admin/photo/<?=$row['item_image']; ?>" width="150px" height="180px">
								<span><?= $row['item_name']; ?> 
								
							</td>
							
							<td>
								<select name="qty" onChange="setQty(this.value,
									<?= $pr= ($row['discount_price']>0)?$row['discount_price']:$row['price']; ?>,<?=$row['item_id']; ?>)">
									<?php for($i=1;$i<=10;$i++): ?>
									<option><?= $i; ?></option>
									<?php endfor; ?>
								</select>
							</td>

							<td>
								$ <?= $pr; ?>
							</td>

							<td>
								$ <span id="total<?= $row['item_id']; ?>"><?=$pr;?></span>
															  
							</td>

						</tr>
						<?php $i++; } ?>

						<tr>
							<td>
								<form action="#" method="post">
								<div class="form-group">
									<label for="coupon">Enter Your coupon Code Here</label>
									<input type="text" name="coupon_code" class="form-control" id="coupon">
								</div>
								<button class="btn btn-md btn-primary" name="coupon_use">Use</button>
								</form>
							</td>
							<td></td>
						
							<td>
								<label>Total</label>
							</td>

							<td>
								
								$ <span id="priceTotal">
									<?php  
										$pt = 0;
										foreach ($_SESSION['cart'] as $row){
											$pt +=($row['discount_price']>0)?$row['discount_price']:$row['price'];
										}
										echo $pt;
									?>	
								  </span>
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script>
		var i=0;

		function setQty(value,qty,item_id){
			var value = value;
			var qty = qty;
			var item_id= item_id;
			total['qty'] = qty;
			total['qty'][i]= value * qty;
			$('#total'+item_id).html(value * qty);
			i++;
			
		}

	</script>

	  
</body>
</html>