<?php 
	session_start();
	require 'functions.php';
	$conn = connect();
<<<<<<< HEAD
=======
	$keywords = isset($_GET['search']) ? $_GET['search']:'';
>>>>>>> develop


	if($conn){
	//New Products
	$query = 'Select * from products order by item_id desc limit 4';
	$new = get($query,$conn);

	//MEN Products
	$query = "Select * from products where categories ='Men' limit 4";
	$men = get($query,$conn);

	//Women Products
	$query = "Select * from products where categories ='Women' limit 4";
	$women = get($query,$conn);
	
	//Kids Products
	$query = "Select * from products where categories ='Kids' limit 4";
	$kids = get($query,$conn);
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
		<div class="row">
			<div class="col-md-12" >
					<img src="admin/images/imc.png">	
		  	</div>
		</div>

		<?php include 'secondNav.php'; ?>

		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="admin/images/sliderOne.jpg" alt="Slider One" width="100%">
				    </div>

				    <div class="item">
				      <img src="admin/images/sliderOne.jpg" alt="Slider Two" width="100%">
				    </div>

				    <div class="item">
				      <img src="admin/images/sliderOne.jpg" alt="Slider Three" width="100%">
				    </div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>

		</div>

		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				New Products
			</div>

			<div class="panel-body">
				<?php while($row = $new->fetch()): ?>
				<div class="col-md-3">
					<img src="admin/photo/<?=$row['item_image']; ?>" width="200px" height="220px">
					<p><?= $row['item_name']; ?></p>
					<p>Price = $<?= $row['price']; ?>&nbsp;&nbsp;&nbsp;Discount Price = $ <?= $row['discount_price']; ?></p>
					
					<a href="add-to-cart.php?page=index&&id=<?= $row['item_id']; ?>" class="btn btn-md btn-primary" id="addtocart" >Add to Cart</a>
				
				</div>
				<?php endwhile; ?>			
			</div>
		</div>

		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				Men Products
			</div>

			<div class="panel-body">
				<?php while($row = $men->fetch()): ?>
				<div class="col-md-3">
					<img src="admin/photo/<?=$row['item_image']; ?>" width="200px" height="220px">
					<p><?= $row['item_name']; ?></p>
					<p>Price = $<?= $row['price']; ?>&nbsp;&nbsp;&nbsp;Discount Price = $ <?= $row['discount_price']; ?></p>
				
					<a href="add-to-cart.php?page=index&&id=<?= $row['item_id']; ?>" class="btn btn-md btn-primary" id="addtocart" >Add to Cart</a>
				</div>
				<?php endwhile; ?>			
			</div>
		</div>

		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				Women Products
			</div>

			<div class="panel-body">
				<?php while($row = $women->fetch()): ?>
				<div class="col-md-3">
					<img src="admin/photo/<?=$row['item_image']; ?>" width="200px" height="220px">
					<p><?= $row['item_name']; ?></p>
					<p>Price = $<?= $row['price']; ?>&nbsp;&nbsp;&nbsp;Discount Price = $ <?= $row['discount_price']; ?></p>
				
					<a href="add-to-cart.php?page=index&&id=<?= $row['item_id']; ?>" class="btn btn-md btn-primary" id="addtocart" >Add to Cart</a>
				</div>
				<?php endwhile; ?>			
			</div>
		</div>

		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				Kids Products
			</div>

			<div class="panel-body">
				<?php while($row = $kids->fetch()): ?>
				<div class="col-md-3">
					<img src="admin/photo/<?=$row['item_image']; ?>" width="200px" height="220px">
					<p><?= $row['item_name']; ?></p>
					<p>Price = $<?= $row['price']; ?>&nbsp;&nbsp;&nbsp;Discount Price = $ <?= $row['discount_price']; ?></p>
					
					<a href="add-to-cart.php?page=index&&id=<?= $row['item_id']; ?>" class="btn btn-md btn-primary" id="addtocart" >Add to Cart</a>

				</div>
				<?php endwhile; ?>			
			</div>
			
		</div>
	
	</div>
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	  
</body>
</html>