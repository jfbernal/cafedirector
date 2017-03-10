<?php
session_start();
ob_start();
include ('../lib/conn.php');

// ***************************************** File to unload process

if (is_uploaded_file($_FILES['filetoupload']['tmp_name']) && $_FILES['filetoupload']['error']==0) {

  $path = '../unloads/' . $_FILES['filetoupload']['name'];
  if (!file_exists($path)) {
    if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $path)) {
      $filelog = "The file was uploaded successfully.";
    } else {
      $filelog = "The file was not uploaded successfully.";
    }
  } else {
    $filelog = "File already exists. Please upload another file.";
  }
} else {
  $filelog = "The file was not uploaded successfully.";
  $filelog = "(Error Code:" . $_FILES['filetoupload']['error'] . ")";
}

// ***************************************** File to unload process


$FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
$UnitAddress = mysqli_real_escape_string($conn, $_POST['UnitAddress']);
$NumberStreet = mysqli_real_escape_string($conn, $_POST['NumberStreet']);
$NameStreet = mysqli_real_escape_string($conn, $_POST['NameStreet']);
$Suburb = mysqli_real_escape_string($conn, $_POST['Suburb']);
$State = mysqli_real_escape_string($conn, $_POST['State']);
$Postcode = mysqli_real_escape_string($conn, $_POST['Postcode']);
$Country = mysqli_real_escape_string($conn, $_POST['Country']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
$Mobile = mysqli_real_escape_string($conn, $_POST['Mobile']);
$Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
$Newsletter = mysqli_real_escape_string($conn, $_POST['Newsletter']);
$joinDate = date("Y-m-d h:i:sa");


$sql = "INSERT INTO membership (first_name, last_name, unit_address, number_street, name_street, suburb, state, postcode, country, email, number_phone, number_mobile, gender, newsletter, image, join_datestamp, filelog)
VALUES ('$FirstName','$LastName', '$UnitAddress','$NumberStreet','$NameStreet','$Suburb','$State','$Postcode','$Country','$Email','$Phone','$Mobile','$Gender','$Newsletter','$path', '$joinDate', '$filelog') "; //SQL query

$result = mysqli_query($conn, $sql);


$username = mysqli_real_escape_string($conn, $_SESSION['pre_username']);
$password = mysqli_real_escape_string($conn, $_SESSION['pre_password']);

$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
$salt = base64_encode($salt);
$salt = str_replace('+', '.', $salt);
$password = crypt($password, '$2y$10$'.$salt.'$');
$role = $_SESSION['pre_role'];
if ($username == "admin"){
  $role = "administrator";
}

if ($_SESSION['logged_storeID'] != "" || $_SESSION['logged_storeID'] != 0){
  $storeID = $_SESSION['logged_storeID'];
  $sql = "INSERT INTO users (username, password, salt, storeID, role, membershipID ) VALUES ('$username','$password','$salt','$storeID','$role',LAST_INSERT_ID()) "; //SQL query
}
else {
  $sql = "INSERT INTO users (username, password, salt, role, membershipID) VALUES ('$username','$password','$salt','$role',LAST_INSERT_ID()) "; //SQL query
}

$result = mysqli_query($conn, $sql);

if(!isset($_SESSION['logged_userID'])){
    $_SESSION['logged_userID'] = mysqli_insert_id($conn);
    $_SESSION['logged_role'] = $role ;
}
unset($_SESSION['pre_username']);
unset($_SESSION['pre_password']);
unset($_SESSION['pre_role']);
if (isset($_SESSION['application_storeID'])){
  if (isset($_SESSION['logged_userID'])){
    header("location:application.php");
  }
}
else {
  header("location:message.php?successful=resgiter");
}


?>
