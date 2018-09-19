<?php 
	$cart = 0;
	if (isset($_SESSION['cart'])){
	$cart=count($_SESSION['cart']);
	}


?>
<nav class="nav navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
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
				<?php if(!empty($_SESSION['first_name'])){ ?>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['first_name'];?>
				<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				        	<li><a href="wallet.php">Wallet</a></li>
				          	<li><a href="#" class="logout-link">Logout</a></li>
				        </ul>
				</a></li>
				<?php }else {?>
		        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
		        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		        <?php } ?>
		        <?php if(isset($_SESSION['email'])): ?>
		        <li><a href="shopping-cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <sup><span class="badge"><?= $cart; ?></span></sup> </a></li>
		    	<?php endif; ?>
      		</ul>
		</div>

	</nav>
	