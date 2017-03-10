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
		// if (isset($_SESSION['application_storeID'])){
				$storeID=$_SESSION['logged_storeID'];
				include ('header.php');
				?>
				<div class="row">
					<!-- <div class="col-xs-2"></div> -->
					<div class="col-xs-12">
							<fieldset>
										<legend>Request training </legend>
										<form name="application_form" id="application_form" method="post" action="application.php" enctype="multipart/form-data">
											<div class="form-group">

												<div class="col-xs-12 col-sm-10 col-sm-offset-1">
														<!-- <div class="row"> -->
															<!-- <div class="col-xs-12"> -->
															<label for="training_type"><span id="required">* </span>Training types:</label>
															<select class="form-control" name="training_type" id="training_type" onchange="load_duties()">
																  <option value=""></option>
																	<option value="barista">Barista</option>
																  <option value="chef">Chef</option>
																  <option value="waitress">Waitress</option>
																	<option value="assistant">Assistant</option>
																	<option value="manager">Manager</option>
															</select>

															<label for="training_duties"><span id="required">* </span>Training duties:</label>
															<select class='form-control' name='training_duties' id='training_duties'>
															</select>

																	<label for="expectation">Additional information:</label>
																	<textarea class="form-control" rows="5" id="expectation" maxlength="1000" name="expectation"></textarea>
															<!-- </div> -->
														<!-- </div> -->
														<!-- <div class="row"> -->
																<!-- <div class="col-xs-6"> -->
																<label for="training_staff"><span id="required">* </span>Staff:</label>
																<select class="form-control" name="training_staff">
																<?php
																	$sql = "SELECT * FROM users WHERE storeID ='$storeID'";
																	$result = mysqli_query($conn, $sql);
																	foreach ($result as $row) {
																		echo "<option value='QLD'>". $row['username']."</option>";

																	}
																?>
																</select>
																		<label for="start_date">When are you looking:</label>
																		<input  class="form-control" type="date" id="start_date" name="start_date" placeholder="" required >

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
					</div>
					<script>
						function load_duties() {
						    var x = document.getElementById("training_type").value;
						    if (x == "barista"){

						        document.getElementById("training_duties").innerHTML = "<option value=‘barista_duty1'>Setting up the café ready for opening.</option><option value='duty2'>Decorating the steamed milk.</option><option value='duty3'>Ensuring the water temperature is correct.</option><option value='duty'>Focused on customer service.</option><option value='duty'>Filling the machine with the correct amount of coffee</option>";
						    }
						    if (x == "chef"){
						        document.getElementById("training_duties").innerHTML = "<option value=‘barista_duty1'>Maintain a prepared and sanitary work area at all times</option><option value='duty2'>Prepare a variety of foods; meat, seafood, poultry, vegetable, and cold food items</option><option value='duty3'>Constantly use safe and hygienic food handling practices</option>";
						    }
								if (x == "waitress"){
						        document.getElementById("training_duties").innerHTML = "<option value=‘barista_duty1'>Take orders from patrons for food or beverages.</option><option value='duty2'>Collect payments from customers.</option><option value='duty3'>Team player</option><option value='duty'>Ability to lift heavy trays filled with glassware/food</option>";
						    }
								if (x == "assistant"){
						        document.getElementById("training_duties").innerHTML = "";
						    }
								if (x == "manager"){
						        document.getElementById("training_duties").innerHTML = "";
						    }
						    // var y = "<select id='mySelect2'><option value='Audi'>Audi_2<option value='BMW'>BMW_2<option value='Mercedes'>Mercedes_2<option value='Volvo'>Volvo_2</select>";

						    // document.getElementById("demo").innerHTML = "You selected: " + y;
						}
					</script>

					<script>
						$("#register_form").validate({
						});
					</script>
				<?php
				include ('footer.php');
				unset($_SESSION['application_storeID']);
	}
}
else {
	header("location:register_account.php");
}

?>
