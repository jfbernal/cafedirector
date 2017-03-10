<?php
session_start();
if(!isset($_SESSION['logged_userID'])){
  header('Location: ../inc/login.php?invalid_entry=1');
}
?>
