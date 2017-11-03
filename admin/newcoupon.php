<?php 
require '../functions.php';
$conn =connect();
if($conn){
	if(isset($_POST['createCoupon'])){
		$couponCode = $_POST['couponcode'];
		$description  = $_POST['description'];
		$amount = $_POST['couponamount'];
		$exp = $_POST['couponexp'];

		$query = 'Insert into coupon (coupon_code,description,coupon_amount,coupon_expire_date) values(:coupon_code,:description,:coupon_amount,:coupon_expire_date)';
		$binding = array(
			':coupon_code' => $couponCode,
			':description' => $description,
			':coupon_amount' => $amount,
			':coupon_expire_date' => $exp
			);
		$res = insert($query,$binding,$conn);
		if($res) echo "<script>alert('Created Successfully');</script>";
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
				<h1 class="page-header">New Coupon</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">New Coupon</div>
					<form action="#" method='post'>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="couponcode">Coupon Code</label>
								<input type="text" name="couponcode" placeholder="Coupon Code" class="form-control" id="couponcode">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="description">Description</label>
								<input type="text" name="description" placeholder="Description" class="form-control" id="description">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="couponamount">Coupon Amount</label>
								<input type="text" name="couponamount" class="form-control" id="couponamount">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="couponexp">Coupon Expire Date</label>
								<input type="text" name="couponexp" class="form-control" id="couponexp">
								<br>
								<input type="submit" name="createCoupon" class="btn btn-lg btn-primary" value="Create">
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

		$('#couponexp').datepicker();

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
