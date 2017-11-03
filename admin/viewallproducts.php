<?php 
session_start();
require '../functions.php';
$conn = connect();
if($conn){
	$query = 'Select * from products';
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<table id="viewproducts">
						    <thead>
						    <tr>
						        <th>Item Image</th>
						        <th>Item Name</th>
						        <th>Item Code</th>
						        <th>Item Price($)</th>
						        <th>Discount ($)</th>
						        <th>Instock</th>
						        <th>Categories</th>
						        <th>Type</th>
						        <th>Manage</th>
						    </tr>
						    </thead>
						   
						    <tbody>
						    	<?php while($row = $result->fetch()): ?>
						    	<tr>
						    		<td><img src="photo/<?=$row['item_image']; ?>" class="img-responsive" width="200px" height="220px">
						    		</td>

						    		<td>
						    			<?= $row['item_name']; ?>
						    		</td>

						    		<td>
						    			<?= $row['item_code']; ?>
						    		</td>

						    		<td>
						    			<?= $row['price']; ?>
						    		</td>

						    		<td>
						    			<?= $row['discount_price']; ?>
						    		</td>

						    		<td>
						    			<?= $row['instock']; ?>
						    		</td>

						    		<td>
						    			<?= $row['categories']; ?>
						    		</td>

						    		<td>
						    			<?= $row['type']; ?>
						    		</td>

						    		 <td><a href='editProduct.php?id=<?=$row['item_id']; ?>'  class='glyphicon glyphicon-pencil'>Edit</a> / <a href='delProduct.php?id=<?=$row['item_id']; ?>' class='glyphicon glyphicon-trash'>Delete</a></td>
						    		
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
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	
<!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>    

	<script>
		$('#calendar').datepicker({
		});

		$('#viewproducts').DataTable();
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
