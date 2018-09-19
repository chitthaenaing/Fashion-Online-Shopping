<?php 
	
	include 'functions.php';
	$conn = connect();
	$status = false;
	$response = '';


	if($conn){
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
		if($res) {
			$status = true;
			$response = 'Registerd Successfully!';
		}
		
	}

	$checkResult = new stdClass();
	$checkResult->status = $status;
	$checkResult->response = $response;

	echo json_encode($checkResult);
?>