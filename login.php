<?php 
	session_start();
	require 'functions.php';
	$conn = connect();
	if($conn){
		if(isset($_POST['login'])){
			//Validate Username and Password
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$query = "Select * from customer_accounts left join bank on customer_accounts.customer_acc_id = bank.customer_id where email='$email' and password='$password'";
			$user = get($query,$conn);
			$status = $user->rowCount();
			//Set SESSION 
				while($row = $user->fetch()){
					$_SESSION['customer_acc_id'] = $row['customer_acc_id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['bank_balance'] = $row['balance'];
				}

			if($status){	
				header("location:index.php");
			}else if($email=='admin@gmail.com' && $password  == md5('asd123')){
				$_SESSION['email'] = $email;
				header("location:admin/dashboard.php");
			}else{
				$error = "Username and Password is invalid";
				echo "<script>alert('$error');</script>";
			}

			

		}
	}
?>
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
							<input type="submit" name="login" value="Login" class="btn btn-primary">		
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
	
	  
</body>
</html>