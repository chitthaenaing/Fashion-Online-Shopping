<?php session_start(); 
include '../functions.php';
$conn = connect();
if($conn){
	$custId = $_GET['custid'];
	$orderId = $_GET['orderid'];
	// $query = 'Select * from customer left join payments on customer.customer_id = payments.customer_id where customer.customer_id='.$custId;
	$query = 'Select * from customer_accounts left join bank on customer_accounts.customer_acc_id = bank.customer_id left join customer on customer_accounts.customer_acc_id = customer.customer_acc_id left join orders on customer_accounts.customer_acc_id = orders.customer_acc_id where customer_accounts.customer_acc_id='.$custId.' and orders.order_id='.$orderId;
	$result = get($query,$conn);
	while($row = $result->fetch()):

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
				<h1 class="page-header"><?=$row['first_name']." ".$row['last_name']; ?></h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?=$row['first_name'].' '.$row['last_name']; ?></div>
					<div class="panel-body">
						Postal Code = <?= $row['postal_code']; ?><br/>
						Delivery Address = <?= $row['address'];?><br/>
						Phone No = <?= $row['phone_no']?><br/>
						Account Name = <?= $row['acc_name']; ?><br/>
						Account Number = <?= $row['acc_no']; ?>
					<?php endwhile; }?>
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
