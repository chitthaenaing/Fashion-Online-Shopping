<?php 
	session_start();
	require 'functions.php';
	$conn = connect();

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

		<?php include 'secondNav.php';?>

		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				<h1>About us</h1>
			</div>

			<div class="panel-body">
				<p>

DreamHouse is one of the best fashion companies. 

The customer is at the heart of our unique business model, which includes design, production, distribution and sales through our extensive retail network.

For more information, please visit the Inditex Group website: www.chitthaenaing.com
				</p>
			</div>
		</div>


	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$('.logout-link').on('click', function(e) {
			console.log('click');
			$.ajax({
		      url:'logout.php', 
		      type:'GET',
		      success:function(data){
		      	var data = JSON.parse(data);
		        
		    	swal("Success!", data.response, "success").then((value) => { window.location.href= data.location});
		      },
		      error:function(data){
		        
			    swal("Oops...", "Something went wrong :(", "error");
		      }
		    });
		});
	</script>

	  
</body>
</html>