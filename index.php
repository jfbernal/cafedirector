<?php
ob_start();
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_SESSION['logged_role'])){
  if ($_SESSION['logged_role']=="director") {
    echo $_SESSION['logged_role'];
    header("location:inc/dashboard.php");

  }
  else {
      header("location:inc/home.php");
  }
}
else {
    // header("location:inc/home.php");
}



?>
<!DOCTYPE html>
<html>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="../css/styles.css" rel="stylesheet" type="text/css" />
  <link href="../css/mobilecolumnstables.css" rel="stylesheet"  title="mobilecomnstables" type="text/css" />
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">

  <body onLoad="$('#IntroModal').modal('show');"></body>
  <div class="modal fade" id="IntroModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Demo Cafe Director </h4>
        </div>
        <div class="modal-body">
          <b>For testing purposes only</b>
          </p>
          <hr>
          <b>Manager role</b>  </p>
          <b>User:</b> manager <b>Password:</b> manager123
          </p>
          <hr>
          <b>Director role:</b></p>

          <b>User:</b> director <b>Password:</b> director123


        </p><br>
          <form class="" action="inc/home.php" method="post">

              <!-- <button type="hidden" class="btn btn-warning" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-warning" >Close</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  </body>
</html>