<?php 
require '../functions.php';
$conn = connect();

if($conn){
	$today = getdate(date('U'));
	$this_month = $today['month'];
	$this_year = $today['year'];
	$query = 'Select * from orders left join customer_accounts on orders.customer_acc_id = customer_accounts.customer_acc_id where MONTHNAME(delivered_date) ='.$this_month.' and YEAR(delivered_date) ='.$this_year;
	$orders = get($query,$conn);
	// var_dump(date_parse($rs_orders['delivered_date'])['year']);

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
				<h1 class="page-header">Monthly Report</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Monthly Report</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<select name="month" id="" class="form-control">
									<option value="1" <?= $this_month == 'January'? 'selected': 'd'?>>January</option>
									<option value="2" <?= $this_month == 'February'? 'selected': ''?>>February</option>
									<option value="3" <?= $this_month == 'March'? 'selected': ''?>>March</option>
									<option value="4" <?= $this_month == 'April'? 'selected': ''?>>April</option>
									<option value="5" <?= $this_month == 'June'? 'selected': ''?>>May</option>
									<option value="6" <?= $this_month == 'June'? 'selected': ''?>>June</option>
									<option value="7" <?= $this_month == 'July'? 'selected': ''?>>July</option>
									<option value="8" <?= $this_month == 'August'? 'selected': ''?>>August</option>
									<option value="9" <?= $this_month == 'September'? 'selected': ''?>>September</option>
									<option value="10" <?= $this_month == 'October'? 'selected': ''?>>October</option>
									<option value="11" <?= $this_month == 'November'? 'selected': ''?>>November</option>
									<option value="12" <?= $this_month == 'December'? 'selected': ''?>>December</option>

								</select>		 
							</div>

							<div class="col-md-4">
								<select name="month" id="" class="form-control">
									<option value="1">2018</option>
									<option value="2">2019</option>
									<option value="3">2020</option>
									<option value="4">2021</option>
									<option value="5">2022</option>
									<option value="6">2023</option>
									<option value="7">2024</option>
									<option value="8">2025</option>
									<option value="9">2026</option>
									<option value="10">2027</option>

								</select>		 
							</div>

							<div class="col-md-4">
								<button class="btn btn-primary" name="submit">Submit</button>		 
							</div>
						</div>
						<table class="table">
						    <thead>
						    <tr>
						      	<th>Order ID</th>
						      	<th>Order Date</th>
						      	<th>Delivered Date</th>
						      	<th>Qty</th>
						      	<th>Total Price</th>
						      	<th>Customer Name</th>
						    </tr>
						    </thead>

						    <tbody>
						    	<?php while($row = $orders->fetch()): ?>
							    	<tr>
							    		<td>
							    			<a href="vieworderitems.php?orderid=<?=$row['order_id']; ?>">
							    				<?= $row['order_id']; ?>
							    			</a>
							    		</td>

							    		<td>
							    			<?= $row['order_date']; ?>
							    		</td>

							    		<td>
							    			<?= $row['delivered_date']; ?>
							    		</td>

							    		<td>
							    			<?= $row['qty']; ?>
							    		</td>

							    		<td>
							    			<?= $row['total_price']; ?>
							    		</td>

							    		<td>
							    			<a href="customerDeliveryDetails.php?custid=<?=$row['customer_acc_id']; ?>">
							    				<?= $row['first_name'].' '.$row['last_name']; ?>
							    			</a>
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
