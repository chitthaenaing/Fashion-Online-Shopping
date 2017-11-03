<?php session_start(); 
include '../functions.php';
$conn = connect();
if($conn){
	$orderId = $_GET['orderid'];
	$query = 'Select * from orders_items left join products on orders_items.item_id = products.item_id where order_id='.$orderId;
	$result = get($query,$conn);
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
				<h1 class="page-header">Orders ID: <?=$orderId; ?></h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Orders ID: <?=$orderId; ?></div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						    	<th>Item ID</th>
						    	<th>Item Image</th>
						        <th>Item Name</th>
						        <th>Item Code</th>
						        <th>Price ($)</th>
						        <th>Categories</th>
						        <th>Type</th>
						    </tr>
						    </thead>

						    <tbody>
						    	<tbody>
                        <?php while($row = $result->fetch()): ?>
                            <tr>
                            		<td><?= $row['item_id']; ?></td>
                        			<td><img src="photo/<?=$row['item_image']; ?>" class="img-responsive" width="200px" height="220px">
						    		</td>

						    		<td>
						    			<?= $row['item_name']; ?>
						    		</td>

						    		<td>
						    			<?= $row['item_code']; ?>
						    		</td>

						    		<td>
						    			<?= ($row['discount_price']>0)?$row['discount_price']:$row['price']; ?>
						    		</td>

						    		<td>
						    			<?= $row['categories']; ?>
						    		</td>

						    		<td>
						    			<?= $row['type']; ?>
						    		</td>	
                            </tr>
                          
                            <?php endwhile; ?>
						    </tbody>
						</table>
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
