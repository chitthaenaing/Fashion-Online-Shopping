<?php 
require '../functions.php';
$conn = connect();
if($conn){

	$query = 'Select * from coupon';
	$res = get($query,$conn);
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
				<h1 class="page-header">Coupon</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Coupon</div>
					<div class="panel-body">
						<table class="table">
						    <thead>
						    <tr>
						      	<th>Coupon Code</th>
						      	<th>Description</th>
						      	<th>Coupon Amount</th>
						      	<th>Coupon Expire Date</th>
						    </tr>
						    </thead>

						    <tbody>
						    	<?php while($row = $res->fetch()): ?>
						    	<tr>
						    		<td>
						    			<?= $row['coupon_code']; ?>
						    		</td>

						    		<td>
						    			<?= $row['description']; ?>
						    		</td>

						    		<td>
						    			$ <?= $row['coupon_amount']; ?>
						    		</td>

						    		<td>
						    			<?= $row['coupon_expire_date']; ?>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		
		$('.logout-link').on('click', function(e) {
			console.log('click');
			$.ajax({
		      url:'../logout.php', 
		      type:'GET',
		      success:function(data){
		      	var data = JSON.parse(data);
		        
		    	swal("Success!", data.response, "success").then((value) => { window.location.href= '../' + data.location});
		      },
		      error:function(data){
		        
			    swal("Oops...", "Something went wrong :(", "error");
		      }
		    });
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
