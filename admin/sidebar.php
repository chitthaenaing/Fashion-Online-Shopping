
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>DreamHouse</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?= (isset($_SESSION['email']))?$_SESSION['email']:""?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" class="logout-link"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<img src="images/imc.png" class="img-responsive">
		</form>
		<ul class="nav menu">
			<li class="active"><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#orders"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> 
					Orders
				</a>
				<ul class="children collapse" id="orders">
					<li>
						<a class="" href="vieworders.php">
							View Orders
						</a>
					</li>
					
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#products"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Products 
				</a>
				<ul class="children collapse" id="products">
					<li>
						<a class="" href="viewallproducts.php">
							View All Products
						</a>
					</li>
					<li>
						<a class="" href="newproducts.php">
							New Products
						</a>
					</li>
				</ul>
			</li>
			
			<li><a href="useraccount.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> User Accounts</a></li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#coupon"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Coupon 
				</a>
				<ul class="children collapse" id="coupon">
					<li>
						<a class="" href="coupon.php">
							 View Coupon
						</a>
					</li>
					<li>
						<a class="" href="newcoupon.php">
							 New Coupon
						</a>
					</li>
					
				</ul>
			</li>

			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#reports"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Reports 
				</a>
				<ul class="children collapse" id="reports">
					<li>
						<a class="" href="viewmonthlyandyearlyreport.php">
							 View Monthly and Yearly Report
						</a>
					</li>
					<!-- <li>
						<a class="" href="viewyearlyreport.php">
							 View Yearly Report
						</a>
					</li> -->
					
				</ul>
			</li>

			
			<li role="presentation" class="divider"></li>
			<li><a href="#" class="logout-link"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
	