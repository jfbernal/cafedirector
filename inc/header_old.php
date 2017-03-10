<?php
// include ('../lib/login_check.php');
?>
<?php
ob_start();
include ('../lib/authorization.php');
include ('../lib/conn.php');
// echo "ver:".$level5;
session_start();
// echo "ver2":.$_SESSION['logged_role'];
?>
<!DOCTYPE HTML>
<html lang="en-GB">
<head>
<title>CAFE Director</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- <link href="../css/star-rating.css" rel="stylesheet" type="text/css" /> -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<!-- <script src="../js/star-rating.js"></script> -->
<script src="../js/jquery.validate.min.js"></script>



<link rel="shortcut icon" href="../img/favicon5.png" type="image/x-icon"/>
</head>
<body>
<!-- BANNER -->
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<img class="img-responsive" src="../img/banner_cafe_director.png" width="850" height="100" alt="Home"  />
	</div>
	<div class="col-xs-2"></div>
</div>
<!-- MAIN MENU -->
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../index.php">Home</a></li>
						<?php
							if(isset($_SESSION['logged_userID'])){
								if ($level1A === 1 || $level8 === 1){
									echo "<li class='dropdown'>";
										echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Applications<span class='caret'></span></a>";
										echo "<ul class='dropdown-menu'>";
										if ($level1A === 1){
											echo "<li><a href='my_application.php'>My Application</a></li>";
										}
										if ($level8 === 1){
											echo "<li><a href='applications_list.php'>Applications list</a></li>";
											echo "<li><a href='stores_list.php'>Applications approved</a></li>";
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
														echo "<li><a href='add_store.php'>Create stores</a></li>";
														echo "<li><a href='stores_list.php'>List stores</a></li>";
														echo "<li><a href='categories.php'>Categories</a></li>";
												}
											echo "</ul>";
										echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Training<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
												if ($role === 'manager'){
														echo "<li><a href='my_store.php'>My training</a></li>";
												}
												if ($level8 === 1){
														echo "<li><a href='add_store.php'>Create training</a></li>";
														echo "<li><a href='stores_list.php'>List training</a></li>";

												}
											echo "</ul>";
										echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Supplies<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
												if ($role === 'manager'){
														echo "<li><a href='my_store.php'>My training</a></li>";
												}
												if ($level8 === 1){
														echo "<li><a href='add_store.php'>Create training</a></li>";
														echo "<li><a href='stores_list.php'>List training</a></li>";

												}
											echo "</ul>";
										echo "</li>";
								}
								if ($level7 === 1){
									echo "<li class='dropdown'>";
									echo "<a class='dropdown-toggle' data-toggle='dropdown' href=''#''>Issues<span class='caret'></span></a>";
											echo "<ul class='dropdown-menu'>";
												if ($role === 'manager'){
														echo "<li><a href='my_store.php'>My training</a></li>";
												}
												if ($level8 === 1){
														echo "<li><a href='add_store.php'>Create training</a></li>";
														echo "<li><a href='stores_list.php'>List training</a></li>";

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
				  </div>
				</nav>
		</div>
		<div class="col-xs-2"></div>
	</div>

	<!-- CONTAINER -->
