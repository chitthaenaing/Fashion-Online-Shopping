<?php 
	session_start();
	require 'functions.php';
	$conn = connect();
	
	$jstatus = false;
	$response = '';
	$location = '';
	
	if($conn){
		// if(isset($_POST['login'])){
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
				//echo "<script>alert('Login Successfully');window.location.href='index.php';</script>";
				
				$jstatus = true;
				$response = 'Login Successfully';
				$location = 'index.php';



			}else if($email=='admin@gmail.com' && $password  == md5('asd123')){
				$_SESSION['email'] = $email;
				//echo "<script>alert('Login Successfully');window.location.href='admin/dashboard.php';</script>";

				$jstatus = true;
				$response = 'Login Successfully';
				$location = 'admin/dashboard.php';
				
			}else{
				$error = "Username and Password is invalid";
				//echo "<script>alert('$error');</script>";
				$jstatus = false;
				$response = $error;
				$location = '';
			}

			

		// }
	}

	$checkResult = new stdClass();
	$checkResult->status = $jstatus;
	$checkResult->response = $response;
	$checkResult->location = $location;

	echo json_encode($checkResult);
?>