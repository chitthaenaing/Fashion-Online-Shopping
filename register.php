<?php 
	
	include 'functions.php';
	$conn = connect();

	if($conn){
		if(isset($_POST['register'])){
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$gender = $_POST['gender'];

			$query = 'Insert into customer_accounts(first_name,last_name,email,password,gender,registered_date) values(:firstName,:lastName,:email,:password,:gender,NOW())';
			$binding = array(
				':firstName' => $firstName,
				':lastName' => $lastName,
				':email' => $email,
				':password' => $password,
				':gender' => $gender
			);
			$res = insert($query,$binding,$conn);
			if($res) echo '<script>alert("Successfully Registered");</script>';

		}		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
				<li><a href="contactus.php">Contact us</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php">Login</a></li>
			</ul>

		</div>

	</nav>
	 

	<div class="jumbotron" style="margin:100px auto;width:50%;">
		<div class="container-fluid">
			<div class="page-header">
				<h3 class="newAccount">Create a New Account</h3>
			</div>

			<form method="post" action="#">

				<label for="requireFields">* Required fields</label>

				<div class="form-group">
					<label for="inputEmail">Email Address*</label>
					<input type="email" name="email" id="inputEmail" class="form-control">
				</div>
				
				<label for="information">Information on your account and on your orders will be sent to this address. Please ensure it is correctly entered. </label>

				<div class="form-group">
					<label for="inputPassword">Password *</label>
					<input type="password" name="password" id="inputPassword" class="form-control">
				</div>

				<div class="form-group">
					<label for="confirmPassword">Confirm Password *</label>
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
				</div>

				<h5>ADDITIONAL INFORMATION</h5>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="firstName">First Name</label>
						<input type="text" class="form-control" id="firstName" name="firstName">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label for="lastName">Last Name</label>
						<input type="text" class="form-control" id="lastName" name="lastName">
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>

				<div class="col-sm-12">
					<label>Gender</label><br/>
					<label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
					<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
				</div>

				<input type="submit" name="register" value="Register" class="btn btn-lg btn-primary col-md-offset-1 col-md-10" style="margin-top:20px;">
			
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	
	  
</body>
</html>