<?php
ob_start();
session_start();
include ('../lib/conn.php');

// $_SESSION['application_storeID'] = $_POST['storeID'];
// echo "SESSIONapplication_storeID:".$_SESSION['application_storeID'];
if (isset($_SESSION['logged_userID'])){
	if (isset($_POST['application_process'])){
		echo "application process";

		$storeID = mysqli_real_escape_string($conn, $_POST['storeID']);
	  $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
	  $expectation = mysqli_real_escape_string($conn, $_POST['expectation']);
	  $add_datestamp = date("Y-m-d h:i:sa");
	  $userID = $_SESSION['logged_userID'];
	  $application_status = "pending";

	  $sql = "INSERT INTO applications (storeID, userID, start_date, expectation, add_datestamp, application_status)
	  VALUES ('$storeID','$userID', '$start_date','$expectation','$add_datestamp', '$application_status') ";
	  $result = mysqli_query($conn, $sql);


	  header("location:message.php?successful=application");

	}
	else {
		if (isset($_SESSION['application_storeID'])){
				$storeID=$_SESSION['application_storeID'];
				include ('header.php');
				?>
				<div class="row">
					<!-- <div class="col-xs-2"></div> -->
					<div class="col-xs-12">
							<fieldset>
										<legend>Application </legend>
										<form name="application_form" id="application_form" method="post" action="application.php" enctype="multipart/form-data">
											<div class="form-group">

												<div class="col-xs-12 col-sm-10 col-sm-offset-1">
														<!-- <div class="row"> -->
															<!-- <div class="col-xs-12"> -->
																	<label for="expectation">Why do your want your own café:</label>
																	<textarea class="form-control" rows="5" id="expectation" maxlength="1000" name="expectation"></textarea>
															<!-- </div> -->
														<!-- </div> -->
														<!-- <div class="row"> -->
																<!-- <div class="col-xs-6"> -->
																		<label for="start_date">When are you looking:</label>
																		<input  class="form-control" type="date" id="start_date" name="start_date" placeholder="" required >
																<!-- </div> -->
														<!-- </div> -->
												<div class="row">

															<div class="col-xs-6">
																<input type="hidden" name="storeID" value="<?php echo $storeID; ?>">
																<button type="submit" class="btn btn-warning" name="application_process" >Send</button>
															</div>
														</div>
												</div>

											</div>
								</form>
							</fieldset>
						</div>
						<!-- <div class="col-xs-2"></div> -->
					</div>
					<script>
						$("#register_form").validate({
						});
					</script>
				<?php
				include ('footer.php');
				unset($_SESSION['application_storeID']);
		}
		else {
			header("location:message.php?warning=application_store");
		}
	}
}
else {
	header("location:register_account.php");
}

?>
