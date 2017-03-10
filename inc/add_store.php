<?php
include ('../lib/login_check.php');
ob_start();
session_start();
?>
<?php
if (isset($_POST['add_new_store'])){
	include ('../lib/conn.php');

	// ***************************************** File to unload process

	if (is_uploaded_file($_FILES['filetoupload']['tmp_name']) && $_FILES['filetoupload']['error']==0) {
	  $img_path = '../unloads/' . $_FILES['filetoupload']['name'];
	  if (!file_exists($img_path)) {
	    if (move_uploaded_file($_FILES['filetoupload']['tmp_name'], $img_path)) {
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


	$namestore = mysqli_real_escape_string($conn, $_POST['namestore']);
	$unit = mysqli_real_escape_string($conn, $_POST['unit']);
	$streetnumber = mysqli_real_escape_string($conn, $_POST['streetnumber']);
	$streetname = mysqli_real_escape_string($conn, $_POST['streetname']);
	$suburb = mysqli_real_escape_string($conn, $_POST['suburb']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone1 = mysqli_real_escape_string($conn, $_POST['phone1']);
	$phone2 = mysqli_real_escape_string($conn, $_POST['phone2']);
	$store_description = mysqli_real_escape_string($conn, $_POST['store_description']);
	$store_status = mysqli_real_escape_string($conn, $_POST['store_status']);
	$franchise_available = mysqli_real_escape_string($conn, $_POST['franchise_available']);

	// $Mobile = mysqli_real_escape_string($conn, $_POST['Mobile']);
	// $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
	// $Newsletter = mysqli_real_escape_string($conn, $_POST['Newsletter']);
	$join_datestamp = date("Y-m-d h:i:sa");

	$sql = "INSERT INTO stores (namestore, unit, streetnumber, streetname, suburb, state, postcode, website, email, phone1, phone2, join_datestamp, update_datestamp, img_path, store_description, store_status, franchise_available)
	VALUES ('$namestore','$unit', '$streetnumber','$streetname','$suburb','$state','$postcode','$website','$email','$phone1','$phone2','$join_datestamp','$join_datestamp','$img_path','$store_description', '$store_status','$franchise_available') "; //SQL query

	$result = mysqli_query($conn, $sql);

	header("location:message.php?successful=resgiter");
}
else {
	include ('header.php');
	?>
	<div class="row">
		<div class="col-xs-12">
			<fieldset>
						<legend>Add Store</legend>
						<form name="register_form" id="register_form" method="post" action="add_store.php" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-xs-12 col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<label for="namestore"><span id="required">* </span>Name Store:</label>
												<input class="form-control"  type="text" id="namestore" name="namestore" placeholder="" required>
											</div>
											<div class="col-xs-6 col-sm-3">
											<label for="store_status"><span id="required">* </span>Status:</label>
											<select class="form-control" name="store_status" id="store_status">
													<option value="open">Open</option>
													<option value="close">Close</option>
													<option value="no-Existing">No-Existing</option>
													<option value="existing">Existing</option>
											</select>
											</div>
											<div class="col-xs-6 col-sm-3">
												<label for="franchise_available">Franchise available</label>
												<input class="form-control"  type="checkbox" id="franchise_available" name="franchise_available"  value="yes"   >
											</div>
										</div>
										<div class="row">
										<div class="col-xs-12">
											<label for="store_description">Store description:</label>
											<textarea class="form-control" rows="5" id="store_description" maxlength="1000" name="store_description"></textarea>
										</div>
									  </div>
										<div class="row">
												<div class="col-xs-6 col-sm-3">
													<label for="unit">Unit:</label>
													<input  class="form-control" type="number" id="unit" name="unit" placeholder=""  >
												</div>
												<div class="col-xs-6 col-sm-3">
													<label for="streetnumber"><span id="required">* </span>Number street:</label>
													<input  class="form-control" type="number" id="streetnumber" name="streetnumber" placeholder=""  required>
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="streetname"><span id="required">* </span>Name street:</label>
													<input  class="form-control" type="text" id="streetname" name="streetname" placeholder="" required >
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
														<label for="suburb"><span id="required">* </span>Suburb or City:</label>
														<input class="form-control"  type="text" id="suburb" name="suburb" placeholder=""  required>
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="state"><span id="required">* </span>State:</label>

												<select class="form-control" name="state" id="state">
													  <option value="QLD">QLD</option>
													  <option value="NSW">NSW</option>
													  <option value="VIC">VIC</option>
													  <option value="SA">SA</option>
												</select>
												<!-- <input class="form-control"  type="text" id="state" name="state" placeholder=""   required> -->
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="postcode"><span id="required">* </span>Postcode:</label>
												<input class="form-control"  type="number" minlength="4" maxlength="4" id="postcode" name="postcode" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="website"><span id="required">* </span>Website:</label>
													<input  class="form-control" type="text" id="website" name="website" placeholder=""   required>

												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="email"><span id="required">* </span>Email:</label>
													<input class="form-control"  type="email" id="email" name="email" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="phone1">Phone 1:</label>
													<input class="form-control"  type="number" minlength="5" maxlength="10" id="phone1" name="phone1" placeholder=""  >
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="phone2">Phone 2:</label>
													<input class="form-control"  type="number" minlength="10" maxlength="10" id="phone2" name="phone2" placeholder=""  >
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="filetoupload">Image:</label>
													<input class="form-control" type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg">
													<!-- <input class="form-control"  type="text" id="Image" name="Image" placeholder=""  > -->
												</div>
										</div>
										<div class="row">

											<div class="col-xs-6">
												<button type="submit" class="btn btn-warning" name="add_new_store" >Submit</button>
											</div>
										</div>
								</div>

							</div>
				</form>
			</fieldset>
			</div>

		</div>
		<script>
		$("#login_form").validate();
		</script>
	<?php
	include ('footer.php');
}
?>
