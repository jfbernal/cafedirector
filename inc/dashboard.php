<?php
ob_start();
session_start();
include ('../lib/conn.php');
$sql1 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID ";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID Where supplies.supplyID = '11'";
$result2 = mysqli_query($conn, $sql2);

if (isset($_SESSION['logged_userID'])){

        // $sql1 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID ";

        ?>

        <?php
				include ('../inc/header.php');
				?>

				<div class="row">

							<fieldset>
										<legend>Dashboard</legend>
										<div class="col-xs-12 col-sm-6 col-lg-4">

                      <!--Div that will hold the pie chart-->
                      <div class="col-xs-12 col-sm-6" >
                        <?php
                          include ('../inc/dashboard_dir01.php');
                        ?>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <?php

                          include ('../inc/dashboard_dir02.php');
                        ?>
                      </div>






										</div>
							</fieldset>

					</div>

				<?php
					include ('../inc/footer.php');


}
else {
	header("location:register_account.php");
}
?>
