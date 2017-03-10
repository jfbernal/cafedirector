<?php
session_start();
if (isset($_POST['submit_login_form'])){
	include ('../lib/conn.php');
	$username = mysqli_real_escape_string($conn, $_POST['Username']);
	$password = mysqli_real_escape_string($conn, $_POST['Password']);
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	if ($count === 1){
		$salt = $row['salt'];
	}
	$password = crypt($password, '$2y$10$'.$salt.'$');
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql) or die(mysql_error());
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);

	if ($count == 1){

	  $_SESSION['logged_userID'] = $row['userID'];
	  $_SESSION['logged_role'] = $row['role'];
		if ($row['storeID'] != NULL){
			$_SESSION['logged_storeID'] = $row['storeID'];
		}
	  header("location:../index.php");
	}
	else {
		header("location:message.php?warning=error_login");
	}
}
?>
