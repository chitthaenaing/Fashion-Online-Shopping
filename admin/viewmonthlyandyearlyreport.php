<?php 
require '../functions.php';
$conn = connect();
$totalPrice = 0;
if($conn){

	if(isset($_GET['submit'])) {
		$this_month = $_GET['month'];
		$this_year = $_GET['year'];

		if($this_year && $this_month) {
			$query = "Select * from orders left join customer_accounts on orders.customer_acc_id = customer_accounts.customer_acc_id where MONTHNAME(delivered_date) ='$this_month' and YEAR(delivered_date) ='$this_year'";
		}else {
			$query = "Select * from orders left join customer_accounts on orders.customer_acc_id = customer_accounts.customer_acc_id where YEAR(delivered_date) ='$this_year'";
		}
		

		$orders = get($query,$conn);
	}else {
		$today = getdate(date('U'));
		$this_month = $today['month'];
		$this_year = $today['year'];
		$query = "Select * from orders left join customer_accounts on orders.customer_acc_id = customer_accounts.customer_acc_id where MONTHNAME(delivered_date) ='$this_month' and YEAR(delivered_date) ='$this_year'";

		$orders = get($query,$conn);
	}
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
				<h1 class="page-header">Monthly and Yearly Report</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Monthly and Yearly Report</div>
					<div class="panel-body">
						<div class="row">
							<form action="#" method="get">
								<div class="col-md-4">
									<select name="month" id="" class="form-control">
										<option value="0">--</option>
										<option value="January" <?= $this_month == 'January'? 'selected': ''?>>January</option>
										<option value="February" <?= $this_month == 'February'? 'selected': ''?>>February</option>
										<option value="March" <?= $this_month == 'March'? 'selected': ''?>>March</option>
										<option value="April" <?= $this_month == 'April'? 'selected': ''?>>April</option>
										<option value="May" <?= $this_month == 'May'? 'selected': ''?>>May</option>
										<option value="June" <?= $this_month == 'June'? 'selected': ''?>>June</option>
										<option value="July" <?= $this_month == 'July'? 'selected': ''?>>July</option>
										<option value="August" <?= $this_month == 'August'? 'selected': ''?>>August</option>
										<option value="September" <?= $this_month == 'September'? 'selected': ''?>>September</option>
										<option value="October" <?= $this_month == 'October'? 'selected': ''?>>October</option>
										<option value="November" <?= $this_month == 'November'? 'selected': ''?>>November</option>
										<option value="December" <?= $this_month == 'December'? 'selected': ''?>>December</option>

									</select>		 
								</div>

								<div class="col-md-4">
									<select name="year" id="" class="form-control">
										<option value="2018" <?= $this_year == '2018'? 'selected': ''?>>2018</option>
										<option value="2019" <?= $this_year == '2019'? 'selected': ''?>>2019</option>
										<option value="2020" <?= $this_year == '2020'? 'selected': ''?>>2020</option>
										<option value="2021" <?= $this_year == '2021'? 'selected': ''?>>2021</option>
										<option value="2022" <?= $this_year == '2022'? 'selected': ''?>>2022</option>
										<option value="2023" <?= $this_year == '2023'? 'selected': ''?>>2023</option>
										<option value="2024" <?= $this_year == '2024'? 'selected': ''?>>2024</option>
										<option value="2025" <?= $this_year == '2025'? 'selected': ''?>>2025</option>
										<option value="2026" <?= $this_year == '2026'? 'selected': ''?>>2026</option>
										<option value="2027" <?= $this_year == '2027'? 'selected': ''?>>2027</option>

									</select>		 
								</div>

								<div class="col-md-4">
									<button class="btn btn-primary" name="submit">Submit</button>		 
								</div>
							</form>
						</div>
						<?php if($orders->rowCount() > 0): ?>
						
						<table class="table">
						    <thead>
						    <tr>
						      	<th>Order ID</th>
						      	<th>Order Date</th>
						      	<th>Delivered Date</th>
						      	<th>Qty</th>
						      	<th>Total Price ($)</th>
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
							    			<?= $row['total_price']; $totalPrice += $row['total_price']?>
							    		</td>

							    		<td>
							    			<a href="customerDeliveryDetails.php?custid=<?=$row['customer_acc_id']; ?>&orderid=<?=$row['order_id']?>">
							    				<?= $row['first_name'].' '.$row['last_name']; ?>
							    			</a>
							    		</td>
							    	</tr>
						    	<?php endwhile; ?>
						    </tbody>
							
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td>Net Total Amount: </td>
									<td colspan="2"><?= $totalPrice; ?></td>
								</tr>
							</tfoot>
						</table>
						<?php else: ?>
						<div class="row" style="margin-top: 20px">
							<div class="col-md-8">
								<div class="alert alert-danger">Record not found</div>
							</div>
						</div>
						<?php endif?>
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
