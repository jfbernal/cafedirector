<?php
// include ('../lib/login_check.php');
?>
<?php
ob_start();
include ('../lib/authorization.php');
include ('../lib/conn.php');
// echo "ver:".$level5;
if(!isset($_SESSION)) {
     session_start();
}
// echo "ver2":.$_SESSION['logged_role'];
?>
<!DOCTYPE HTML>
<html lang="en-GB">
<head>
<title>CAFE Director</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Local CSS -->
<!--
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<link href="../css/mobilecolumnstables.css" rel="stylesheet"  title="mobilecomnstables" type="text/css" />
<script src="../js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
-->
<!-- Internet CSS -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<link href="../css/mobilecolumnstables.css" rel="stylesheet"  title="mobilecomnstables" type="text/css" />
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">



<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>




<link rel="shortcut icon" href="../img/favicon5.png" type="image/x-icon"/>
</head>
<body>
<div class="container-fluid">

<!-- BANNER -->
<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
		<img class="img-responsive" src="../img/banner_cafe_director.png" width="1250" height="50" alt="Home"  />
	</div>
</div>
<!-- MAIN MENU -->
<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
	<nav class="navbar navbar-inverse">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../index.php"><span class='glyphicon glyphicon-home'></span> Home</a></li>
					<li class="active"><a href="../inc/explore_store.php">Explore more store</a></li>
						<?php
							if(isset($_SESSION['logged_userID'])){
								if ($role === 'registered'|| $level8 === 1){
									echo "<li class='dropdown'>";
										echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Applications<span class='caret'></span></a>";
										echo "<ul class='dropdown-menu'>";
										if ($role === 'registered'){
											echo "<li><a href='my_application.php'>My Application</a></li>";
										}
										if ($level8 === 1){
											echo "<li><a href='applications_list.php'>Applications list</a></li>";
											echo "<li><a href=''>Applications approved</a></li>";
										}


										echo "</ul>";
									echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Stores<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
												if ($role === 'manager'){
														echo "<li><a href='my_store.php'>My store</a></li>";
												}
												if ($level8 === 1){
														// echo "<li><a href='add_store.php'>Create stores</a></li>";
														// echo "<li><a href='stores_list.php'>List stores</a></li>";
														echo "<li><a href='stores.php'>Stores</a></li>";

												}
											echo "</ul>";
										echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Training<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
												if ($role === 'manager'){
														echo "<li><a href='request_training.php'>Order training</a></li>";
												}

												if ($level8 === 1){
														// echo "<li><a href='add_training.php'>Create training</a></li>";
														echo "<li><a href='trainings.php'>Training</a></li>";
                            echo "<li><a href='request_training.php'>Order training</a></li>";

												}
											echo "</ul>";
										echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Supplies<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
                        if ($level8 === 1){
                            echo "<li><a href='supplies.php'>Supplies</a></li>";
                            echo "<li><a href='order_supplies.php'>Order supplies</a></li>";

                        }
                        if ($role === 'manager'){

														echo "<li><a href='order_supplies.php'>Order supplies</a></li>";
												}

											echo "</ul>";
										echo "</li>";
								}


							}
							?>
				      <!-- <li><a href="contact.php">Training</a></li> -->
							<?php

							if(isset($_SESSION['logged_userID'])){
								 if ($level5 === 1){
										echo "<li class='dropdown'>";
										echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Accounts<span class='caret'></span></a>";
										echo "<ul class='dropdown-menu'>";
										if ($level7 === 1 ){
											echo "<li><a href='register_account.php'>Create account</a></li>";
											echo "<li><a href='members_list.php'>All members</a></li>";
										}

										echo "<li><a href='my_account.php'>My account</a></li>";
										echo "</ul>";
										echo "</li>";
									}
									else if ($_SESSION['logged_role'] == "member"){
										echo "<li class='dropdown'>";
										echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>My Account<span class='caret'></span></a>";
										echo "<ul class='dropdown-menu'>";

										echo "<li><a href='my_account.php'>My profile</a></li>";
										echo "</ul>";
										echo "</li>";
									}

							}
							?>

				      </ul>

				      <ul class="nav navbar-nav navbar-right">
								<?php
								if(isset($_SESSION['logged_userID'])){
									echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
								}
								else {
									echo "<li><a href='register_account.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
									echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
								}
								?>
				      </ul>
							<br>
							<ul class="nav navbar-nav navbar-right">
								<li><form action="search.php" method="post">
												<input type="text" name="search_form" value="">
												<input type="submit" name="search" value="Search">
										</form>
								</li>
							</ul>

				    </div>

				</nav>
		</div>
		<!-- <div class="col-xs-2"></div> -->
	</div>
	<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

	<!-- CONTAINER -->