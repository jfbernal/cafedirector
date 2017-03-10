<?php
if(!isset($_SESSION)) {
     session_start();
}
$level1 = 0;$level2 = 0;$level3 = 0;$level4 = 0;$level5 = 0;$level6 = 0;$level7 = 0;$level8 = 0;$level9 = 0;
$role = "";
// $role1 = 0;$role2 = 0;$role3 = 0;$role4 = 0;$role5 = 0;$role1 = 0;$role1 = 0;$role1 = 0;
if(isset($_SESSION['logged_role'])) {
  if ($_SESSION['logged_role'] === 'registered'){
    $role = 'registered';
  }
  if ($_SESSION['logged_role'] === 'staff'){
    $role = 'staff';
  }
  if ($_SESSION['logged_role'] === 'manager'){
    $role = 'manager';
  }
  if ($_SESSION['logged_role'] === 'leader'){
    $role = 'leader';
  }
  if ($_SESSION['logged_role'] === 'director'){
    $role = 'director';
  }
  if ($_SESSION['logged_role'] === 'administrator'){
    $role = 'admin';
  }

  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'staff'){
    $level1 = 1;
  }
  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'manager'){
    $level1A = 1;
  }
  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'staff' || $_SESSION['logged_role'] === 'manager'){
    $level2 = 1;
  }
  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'staff' || $_SESSION['logged_role'] === 'manager' || $_SESSION['logged_role'] === 'leader'){
    $level3 = 1;
  }
  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'staff' || $_SESSION['logged_role'] === 'manager' || $_SESSION['logged_role'] === 'leader' || $_SESSION['logged_role'] === 'director'){
    $level4 = 1;
  }
  if ($_SESSION['logged_role'] === 'registered' || $_SESSION['logged_role'] === 'staff' || $_SESSION['logged_role'] === 'manager' || $_SESSION['logged_role'] === 'leader' || $_SESSION['logged_role'] === 'director' || $_SESSION['logged_role'] === 'administrator'){
    $level5 = 1;
  }
  if ($_SESSION['logged_role'] === 'staff' || $_SESSION['logged_role'] === 'manager' || $_SESSION['logged_role'] === 'leader' || $_SESSION['logged_role'] === 'director' || $_SESSION['logged_role'] === 'administrator'){
    $level6 = 1;
  }
  if ($_SESSION['logged_role'] === 'manager' || $_SESSION['logged_role'] === 'leader' || $_SESSION['logged_role'] === 'director' || $_SESSION['logged_role'] === 'administrator'){
    $level7 = 1;
  }
  if ($_SESSION['logged_role'] === 'leader' || $_SESSION['logged_role'] === 'director' || $_SESSION['logged_role'] === 'administrator'){
    $level8 = 1;
  }
  if ($_SESSION['logged_role'] === 'director' || $_SESSION['logged_role'] === 'administrator'){
    $level9 = 1;
  }


}


?>
