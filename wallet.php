<?php 
	session_start();
	$customer_id = $_SESSION['customer_acc_id'];
	require 'functions.php';
	$conn = connect();

	if($conn){

		if(isset($_POST['set-up'])) {
			$query = "insert into bank(acc_name, acc_no, balance, customer_id) values(:acc_name, :acc_no, :balance, :customer_id)";

			$binding = array(
				':acc_name' => $_POST['account_name'],
				':acc_no' => $_POST['account_no'],
				':balance' => 0,
				':customer_id' => $customer_id
			);

			$res = insert($query, $binding, $conn);
			if($res) {
				$_SESSION['bank_balance'] = $_POST['top-up-balance'];
				echo "<script>alert('Finished Bank Account Set up')</script>";
			}

		}else if(isset($_POST['top-up'])) {

			$query = "update bank set balance = :balance where customer_id = $customer_id";

			$binding = array(
				':balance' => $_POST['top-up-balance']
			);

			$res = insert($query, $binding, $conn);
			if($res) {
				$_SESSION['bank_balance'] = $_POST['top-up-balance'];
				echo "<script>alert('Topped up Successfully')</script>";
			}
		}

		$query = 'Select * from bank where customer_id ='. $customer_id;
		$get_bank_info = get($query, $conn);
		$res_bank_info = $get_bank_info->fetch();
		
	}

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

		
		<div class="panel panel-default" style="margin-top:2%">
			<div class="panel-heading">
				Wallet
			</div>
	
			<div class="panel-body">
				<!-- Bank Accout Initial State -->
				<div class="row wallet-initial <?= $get_bank_info ->rowCount() > 0 ? 'hide': ''?>">
					<div class="col-md-12 text-align-center">
						<p>
							Your Wallet hasn't been set up yet. To get started, click plus button
						</p>

						<button class="btn btn-default plus-btn"><span class="glyphicon glyphicon-plus"></span></button>
					</div>
				</div>
				
				<!-- To get started set up band account -->
				<div class="row wallet-add-info hide">
					<div class="col-md-12 text-align-center">
						<form action="#" method="post">

							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_name">Account Name</label>
								</div>
								<div class="col-md-6">
									<input type="text" id="account_name" class="form-control margin-auto" name="account_name">
								</div>
							</div>
		
							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_no">Account No</label>
								</div>
								<div class="col-md-6">
									<input type="number" id="account_no" class="form-control margin-auto" name="account_no">
								</div>
							</div>

							<button class="btn btn-primary" type="submit" name="set-up">Set up</button>

						</form>
					</div>
				</div>
				
				<!-- After set up, the bank account gets to ready to use -->
				<div class="row wallet-sidebar <?= $get_bank_info ->rowCount() < 1 ? 'hide': ''?>">
					<div class="col-md-4">
						<div class="list-group">
						  	<a href="#" class="list-group-item wallet-info-tab active">
						    Wallet Info
						  	</a>
						  	<a href="#" class="list-group-item top-up-tab">Top up</a>
						</div>
					</div>

					<div class="col-md-8 wallet-info-tab--content">
						<form action="#" method="post">
							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_name">Account Name</label>
								</div>
								<div class="col-md-6">
									<input type="text" id="account_name" class="form-control margin-auto" name="account_name" value="<?= $res_bank_info['acc_name']?>" disabled>
								</div>
							</div>
		
							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_no">Account No</label>
								</div>
								<div class="col-md-6">
									<input type="number" id="account_no" class="form-control margin-auto" name="account_no" value="<?= $res_bank_info['acc_no']?>" disabled>
								</div>
							</div>

							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="balance">Balance ($)</label>
								</div>
								<div class="col-md-6">
									<input type="number" id="balance" class="form-control margin-auto" name="balance" aria-describedby="basic-addon2" value="<?= $res_bank_info['balance']?>" disabled>
								</div>
							</div>

						</form>
					</div>

					<div class="col-md-8 top-up-tab--content hide">
						<form action="#" method="post">
							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_name">Account Name</label>
								</div>
								<div class="col-md-6">
									<input type="text" id="account_name" class="form-control margin-auto" name="account_name" value="<?= $res_bank_info['acc_name']?>" disabled>
								</div>
							</div>
		
							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="account_no">Account No</label>
								</div>
								<div class="col-md-6">
									<input type="number" id="account_no" class="form-control margin-auto" name="account_no" value="<?= $res_bank_info['acc_no']?>" disabled>
								</div>
							</div>

							<div class="row margin-bottom-20px">
								<div class="col-md-6">
									<label for="balance">Balance ($)</label>
								</div>
								<div class="col-md-6">
									<input type="number" id="balance" class="form-control margin-auto" name="top-up-balance" placeholder="Enter amount">
								</div>
							</div>

							<button class="btn btn-primary" type="submit" name="top-up">Confirm</button>

						</form>
					</div>
				</div>

			</div>
		</div>

		
	
	</div>
	<script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.plus-btn').on('click', function() {
				$('.wallet-initial').addClass('hide')
				$('.wallet-add-info').removeClass('hide');
			})

			$('.wallet-info-tab').on('click', function() {
				$('.wallet-info-tab--content').removeClass('hide');
				$('.top-up-tab--content').addClass('hide');
				$(this).addClass('active');
				$('.top-up-tab').removeClass('active');
			})

			$('.top-up-tab').on('click', function() {
				$('.wallet-info-tab--content').addClass('hide');
				$('.top-up-tab--content').removeClass('hide');
				$(this).addClass('active');
				$('.wallet-info-tab').removeClass('active');
			})
		});

	</script>
</body>
</html>