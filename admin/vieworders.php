<?php session_start(); 
include '../functions.php';
$conn = connect();
if($conn){
	$query = 'Select * from orders left join customer_accounts on orders.customer_acc_id = customer_accounts.customer_acc_id';
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
				<h1 class="page-header">View Orders</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">View Orders</div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						    	<th>Order ID</th>
						        <th>Customer Name</th>
						        <th>Order Date</th>
						        <th>Delivered Date</th>
						        <th>Order Qty</th>
						        <th>Total</th>
						        <th>Status</th>
						        <th>Action</th>
						    </tr>
						    </thead>

						    <tbody>
						    	<tbody>
                        <?php while($row = $result->fetch()): ?>
                            <tr>
                        		<td><a href="vieworderitems.php?orderid=<?=$row['order_id']; ?>"><?=$row['order_id']; ?></a></td>
                                <td><a href="customerDeliveryDetails.php?custid=<?=$row['customer_acc_id']; ?>&orderid=<?=$row['order_id']?>"><?=$row['first_name']." ".$row['last_name'];?></a></td>
                                <td><?=$row['order_date'];?></td>
                                <td><?=$row['delivered_date'];?></td>
                                <td><?=$row['qty']; ?></td>
                                <td>$ <?=$row['total_price'];?></td>
                                <td><?= ($row['status'] == 0)?'In Progress':'Delivered';?></td>
                                <?php if($row['status'] == 0): ?>
                                <td><a href='orderstatus.php?id=<?=$row['order_id'];?>&status=1'>Mark as Delivered</a></td>
                                <?php else: ?>
                                <td>No Action</td>	
                            	<?php endif; ?>
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
