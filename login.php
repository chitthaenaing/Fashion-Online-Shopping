<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/custom.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
</head>
<body>
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">
					<span>DreamHouse</span>
				</a>
			</div>
		</div>

		<div class="collapse navbar-collapse" id="myNavBar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutus.php">About us</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="contact.php">Contact us</a></li>
			</ul>

		</div>

	</nav>
	 

	<div class="jumbotron" style="margin:100px auto;width:70%;">
		<div class="container-fluid">
		<!-- Login Div -->
		<div class="row">
			<div class="login col-sm-12 col-md-8 col-lg-8">
				<div class="page-header">
					<h3 style="font-weight:800;">Login</h3>
				</div>
				<form class="form-horizontal" action="#" method="POST">
					<div class="form-group">
						<label for="inputEmail" class="control-label col-xs-4">Email*</label>
						<div class="col-xs-8">
							<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email"> 
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword" class="control-label col-xs-4">Password*</label>
						<div class="col-xs-8">
							<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"> 
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-xs-offset-4 col-xs-8">
							<input type="submit" name="login" value="Login" class="btn btn-primary" id="login-btn">		
						</div>
					</div>
					
				</form>	
			</div>
			<div class="clearfix visible-sm-block"></div>
			
			<!-- New Register Div -->

			<div class="register col-sm-12 col-md-4 col-lg-4">
				<div class="page-header">
					<h3 style="font-weight:800;">New to DreamHouse?</h3>
				</div>

				<a href="register.php" name="register" class="btn btn-default btn-lg btnRegister">Register</a>
			</div>

			<div class="clearfix visible-sm-block"></div>
			<div class="clearfix visible-md-block visible-lg-block"></div>
		</div>
		</div>
	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$('#login-btn').on('click', function(e) {
			var email = $('#inputEmail').val();
			var password = $('#inputPassword').val();
			$.ajax({
		      url:'check-auth.php', 
		      data: {email: email, password: password},
		      type:'POST',
		      success:function(data){
		      	var data = JSON.parse(data);
		      	
			    if(data.status) {
			    	swal("Success!", data.response, "success").then((val) => {
				    	window.location.href= data.location;
				    });
			    }else {
			    	swal("Fail!", data.response, "error").then((val) => {
				    	window.location.href= data.location;
				    });
			    }
		      },
		      error:function(data){
		        
			    swal("Oops...", "Something went wrong :(", "error");
		      }
		    });
		    e.preventDefault(); 
		})
	</script>
	  
</body>
</html>