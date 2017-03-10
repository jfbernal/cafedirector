<?php
if (isset($_POST['Username'])){
    session_start();
    include ('../lib/conn.php');

    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $role = mysqli_real_escape_string($conn, $_POST['Role']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 0){
      $_SESSION['pre_username'] = $username;
      $_SESSION['pre_password'] = $password;
      $_SESSION['pre_role'] = $role;
      header('location:register_details.php');
    }
    else {
      $user = $row['username'];
      $str = "location:register_account.php?user=". $user ;
      header($str);
    }
}
?>
