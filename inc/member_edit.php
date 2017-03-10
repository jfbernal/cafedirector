<?php
include ('../lib/login_check.php');
include ('../lib/conn.php');
ob_start();
if(!isset($_SESSION)) {
     session_start();
}
if (isset($_POST['member_edit_form'])){
	if (isset($_POST['membershipID'])){

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
			// $Role = mysqli_real_escape_string($conn, $_POST['Role']);
			// Lista de member change role
			$Role = $_SESSION['logged_role'];
			// echo $Newsletter;
			$update_datestamp = date("Y-m-d h:i:sa");
			$membershipID = mysqli_real_escape_string($conn, $_POST['membershipID']);

			if ($path==""){
				$sql = "UPDATE membership SET first_name = '$FirstName',last_name = '$LastName',unit_address = '$UnitAddress',number_street = '$NumberStreet',name_street = '$NameStreet',suburb = '$Suburb',state = '$State',postcode = '$Postcode' ,country = '$Country' ,	email = '$Email' ,number_phone = '$Phone',
				number_mobile = '$Mobile',gender = '$Gender',update_datestamp = '$update_datestamp'
				WHERE membershipID = $membershipID";
			}
			else {
				$sql = "UPDATE membership SET first_name = '$FirstName',last_name = '$LastName',unit_address = '$UnitAddress',number_street = '$NumberStreet',name_street = '$NameStreet',suburb = '$Suburb',state = '$State',postcode = '$Postcode' ,country = '$Country' ,	email = '$Email' ,number_phone = '$Phone',
				number_mobile = '$Mobile',gender = '$Gender',update_datestamp = '$update_datestamp', image = '$path'
				WHERE membershipID = $membershipID";
			}

			$result = mysqli_query($conn, $sql);

			$sql = "UPDATE users SET role = '$Role'
			WHERE membershipID = $membershipID"; //SQL query

			$result = mysqli_query($conn, $sql);
			header("location:message.php?successful=update");
	}

}
else{
	include ('header.php');
	$memberID = mysqli_real_escape_string($conn, $_POST['memberID']);
	$sql = "SELECT * FROM users JOIN membership WHERE users.membershipID='$memberID' AND users.membershipID = membership.membershipID;";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
?>
<div class="row">
	<!-- <div class="col-xs-2"></zdiv> -->
	<div class="col-xs-12">
			<fieldset>
						<legend>Member edit </legend>
						<form name="register_form" id="register_form" method="post" action="member_edit.php" enctype="multipart/form-data">
							<div class="form-group">

								<div class="col-xs-12 col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<label for="FirstName"><span id="required">* </span>First name:</label>
												<input class="form-control"  type="text" id="FirstName" name="FirstName" value="<?php echo $row['first_name']; ?>" placeholder="" required>
											</div>
											<div class="col-xs-12 col-sm-6">
												<label for="LastName"><span id="required">* </span>Last name:</label>
												<input  class="form-control" type="text" id="LastName" name="LastName"  value="<?php echo $row['last_name']; ?>" placeholder=""   required>
											</div>
										</div>
										<div class="row">
												<div class="col-xs-6 col-sm-3">
													<label for="UnitAddress">Unit:</label>
													<input  class="form-control" type="number" id="UnitAddress" name="UnitAddress"  value="<?php echo $row['unit_address']; ?>"  placeholder=""  >
												</div>
												<div class="col-xs-6 col-sm-3">
													<label for="NumberStreet"><span id="required">* </span>Number street:</label>
													<input  class="form-control" type="number" id="NumberStreet" name="NumberStreet"  value="<?php echo $row['number_street']; ?>"  placeholder=""  required>
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="NameStreet"><span id="required">* </span>Name street:</label>
													<input  class="form-control" type="text" id="NameStreet" name="NameStreet"  value="<?php echo $row['name_street']; ?>" placeholder="name" required >
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
														<label for="Suburb"><span id="required">* </span>Suburb or City:</label>
														<input class="form-control"  type="text" id="Suburb" name="Suburb" placeholder="Suburb"  value="<?php echo $row['suburb']; ?>"  required>
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="State"><span id="required">* </span>State:</label>
												<input class="form-control"  type="text" id="State" name="State"  value="<?php echo $row['state']; ?>" placeholder=""   required>
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="Postcode"><span id="required">* </span>Postcode:</label>
												<input class="form-control"  type="number" minlength="4" maxlength="4" id="Postcode" name="Postcode"  value="<?php echo $row['postcode']; ?>" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="Country">Country:</label>
													<input class="form-control"  type="text" id="Country" name="Country"  value="<?php echo $row['country']; ?>" placeholder=""   required>
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="Email"><span id="required">* </span>Email:</label>
													<input class="form-control"  type="email" id="Email" name="Email"  value="<?php echo $row['email']; ?>" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="Phone">Phone:</label>
													<input class="form-control"  type="number" minlength="5" maxlength="10" id="Phone" name="Phone"  value="<?php echo $row['number_phone']; ?>" placeholder=""  >
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="Mobile">Mobile:</label>
													<input class="form-control"  type="number" minlength="9" maxlength="10" id="Mobile" name="Mobile"  value="<?php echo $row['number_mobile']; ?>" placeholder=""  >
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-4">
													<label for="GenderMale"><span id="required">* </span>Gender:</label><br>
													<label class="radio-inline"><input type="radio" name="Gender" value="male" <?php if ($row['gender']=='male') {echo "checked='checked'";} ?> >Male</label>
													<label class="radio-inline"><input type="radio" name="Gender" value="female" <?php if ($row['gender']=='female') {echo "checked='checked'";} ?>>Female</label>
												</div>
												<div class="col-xs-12 col-sm-2">
												
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="filetoupload">Image:</label>
													<input class="form-control" type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg"  value="<?php echo $row['image']; ?>">
													<!-- <input class="form-control"  type="text" id="Image" name="Image" placeholder=""  > -->
												</div>
												<div class="col-xs-6 col-xs-offset-4">
												<?php
												if(isset($_SESSION['logged_userID'])){
													if ($_SESSION['logged_role'] == "administrator"){
												?>


													<label for="Role"><span id="required">* </span>Role:</label><br>
													<label class="radio-inline"><input type="radio" name="Role" value="member" <?php if ($row['role']=='member') {echo "checked='checked'";} ?> >Member</label>
													<label class="radio-inline"><input type="radio" name="Role" value="administrator"  <?php if ($row['role']=='administrator') {echo "checked='checked'";} ?> >Administrator</label>


												<?php
														}
												}
												?>
												</div>
										</div>
										<div class="row">

											<div class="col-xs-6">
												<input type="hidden" name="membershipID" value="<?php echo $row['membershipID']; ?>">
												<button type="submit" class="btn btn-warning" name="member_edit_form" >Update</button>
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
}
?>
