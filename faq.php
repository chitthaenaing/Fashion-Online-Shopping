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
 <style type="text/css">
 	.faq{
 		width: 100%;
 		border: 1px solid grey;
 		padding: 1px;
 		margin-bottom: 8px;
 	}
 	h3{
 		color: #fff;
 		background: grey;
 		padding:8px;
 		margin: 0;
 		cursor: pointer;
 	}
 	h3.up{
 		color: #ffd;
 	}
 </style>
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
				<h1>FAQ</h1>
			</div>

			<div class="panel-body">
				<div class="faq">
					<h3>How can I change my shipping address?</h3>
					<p>By default, the last used shipping address will be saved into your Sample Store account. When you are checking out your order, the default shipping address will be displayed and you have the option to amend it if you need to.</p>		
				</div>

				<div class="faq">
					<h3>Why must I make payment immediately at checkout?</h3>
					<p>Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.</p>		
				</div>

				<div class="faq">
					<h3>How do I cancel my orders before I make a payment?</h3>
					<p>After logging into your account, go to your Shopping Cart. Here, you will be able to make payment or cancel your order. Note: We cannot give refunds once payment is verified.</p>		
				</div>
				

				<div class="faq">
					<h3>How long will it take for my order to arrive after I make payment?</h3>
					<p>Members who ship their orders within Singapore should expect to receive their orders within five (5) to ten (10) working days upon payment verification depending on the volume of orders received.If you experience delays in receiving your order, contact us immediately and we will help to confirm the status of your order.</p>		
				</div>
				
				
			</div>
		</div>


	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		$("document").ready(function(){
			$('h3').click(function(){
				var parent = $(this).parent();
				$("p",parent).slideToggle("fast");
				$(this).toggleClass("up");
			})

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
		});

	</script>
	  
</body>
</html>