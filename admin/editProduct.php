<?php 
require '../functions.php';

$conn = connect();

if($conn){
	
	$product_id = $_GET['id'];

	//To get product info
	$query = "Select * from products where item_id = '$product_id'";
	$get_product = get($query, $conn);
	$rs_product = $get_product->fetch();

	if(isset($_POST['updateProduct'])) {
		$productName = $_POST['productname'];
		$productCode = $_POST['productcode'];
		$checkCat = implode(",",$_POST['check_cat']);
		$productType = $_POST['type'];
		$price = $_POST['price'];
		$discountPrice = $_POST['discount_price'];
		$name = $_FILES['photo']['name'];
		$tmp = $_FILES['photo']['tmp_name'];
		$type = $_FILES['photo']['type'];
		if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
			move_uploaded_file($tmp, "photo/$name");
		}
		$instock = $_POST['instock'];
		
		$query = "update products set item_name = :productName, item_code = :productCode, price = :price ,item_image = :name, discount_price = :discountPrice , instock = :instock, categories = :cat,type = :productType where item_id= '$product_id'";
		
		$binding=array(
			':productName' => $productName,
			':productCode' => $productCode,
			':price' => $price, 
			':name' => $name,
			':discountPrice' => $discountPrice,
			':instock' => $instock,
			':cat' => $checkCat,
			':productType' =>  $productType
			);
		$res = insert($query,$binding,$conn);
		if($res) {
			echo "<script>alert('Saved Successfully');
			window.location.href='viewallproducts.php'</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DreamHouse </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php include 'sidebar.php'; ?>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Products</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Update Product</div>
					<div class="panel-body">
						<form action="#" method="post" enctype="multipart/form-data" > 
							<div class="row">
								<div class="form-group col-md-6">
									<label>Name</label>
									<input type="text" name="productname" class="form-control" value="<?= $rs_product[item_name]?>">
								</div>

								<div class="form-group col-md-6">
									<label>Product Code</label>
									<input type="text" name="productcode" class="form-control" value="<?= $rs_product[item_code]?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label>Categories</label>
									<div class="checkbox">
										<label><input type="checkbox" name="check_cat[]" value="Men" <?= $rs_product[categories] == 'Men' ? checked : ''?>>Men</label>	
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="check_cat[]" value="Women" <?= $rs_product[categories] == 'Women' ? checked : ''?>>Women</label>	
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="check_cat[]" value="Kids" <?= $rs_product[categories] == 'Kids' ? checked : ''?>>Kids</label>	
									</div>
								</div>

								<div class="form-group col-md-6">
									<label>Type</label>
									<select name="type" class="form-control">
										<option selected>Choose Type</option>
										<option value="Shirts" <?= $rs_product[type] == 'Shirts' ? selected : ''?>>Shirts</option>
										<option value="Pants" <?= $rs_product[type] == 'Women' ? selected : ''?>>Pants</option>
										<option value="Boots" <?= $rs_product[type] == 'Women' ? selected : ''?>>Boots</option>
										<option value="Dresses" <?= $rs_product[type] == 'Women' ? selected : ''?>>Dresses</option>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-6">
									<label for="price">Price</label>
									<input type="text" name="price" class="form-control" id="price" value="<?= $rs_product[price]?>">
									
								</div>

								<div class="form-group col-md-6">
									<label for="discount_price">Discount Price</label>
									<input type="text" name="discount_price" class="form-control" id="discount_price" value="<?= $rs_product[discount_price]?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-12">
									<label for="image">Image</label>
									<input type="file" name="photo" id="image"><br/>
								</div>
							</div>


							<div class="row">
								<div class="form-group col-md-2">
									<label for="instock">Instock</label>
									<input type="text" class="form-control" name="instock" id="instock" id="instock" value="<?= $rs_product[instock] ?>"><br/>	
									<input type="submit" class="btn btn-lg btn-primary" value="Insert" name="updateProduct">
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
