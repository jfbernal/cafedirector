<?php
include ('../lib/login_check.php');
ob_start();
session_start();
?>
<?php

	if (isset($_POST['store_edit_process'])){
			include ('../lib/conn.php');


			// ***************************************** File to unload process

			if (is_uploaded_file($_FILES['filetoupload']['tmp_name']) && $_FILES['filetoupload']['error']==0) {

				$img_path = './unloads/' . $_FILES['filetoupload']['name'];
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

			$update_datestamp = date("Y-m-d h:i:sa");
			$storeID = mysqli_real_escape_string($conn, $_POST['storeID']);
			if ($img_path==""){

				$sql = "UPDATE stores SET namestore = '$namestore', unit = '$unit', streetnumber = '$streetnumber', streetname = '$streetname', suburb = '$suburb', state = '$state',postcode = '$postcode' ,website = '$website' ,	email = '$email' ,phone1 = '$phone1',
				phone2 = '$phone2',update_datestamp = '$update_datestamp',store_description = '$store_description',store_status = '$store_status',franchise_available = '$franchise_available'
				WHERE storeID = $storeID";
			}
			else {
				$sql = "UPDATE stores SET namestore = '$namestore', unit = '$unit', streetnumber = '$streetnumber',streetname = '$streetname',suburb = '$suburb',state = '$state',postcode = '$postcode' ,website = '$website' ,	email = '$email' ,phone1 = '$phone1',
				phone2 = '$phone2',update_datestamp = '$update_datestamp',store_description = '$store_description',img_path = '$img_path', store_status = '$store_status',franchise_available = '$franchise_available'
				WHERE storeID = $storeID";
			}
			$result = mysqli_query($conn, $sql);
			header("location:message.php?successful=resgiter");
	}
	else {
		if (isset($_POST['submit_store_edit'])){
				include ('../lib/conn.php');
				include ('header.php');
				$storeID = mysqli_real_escape_string($conn, $_POST['storeID']);
				$sql = "SELECT * FROM stores WHERE storeID='$storeID'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);
				?>
				<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-8">
						<fieldset>
									<legend>Store edit</legend>
									<form name="register_form" id="register_form" method="post" action="store_edit.php" >
										<div class="form-group">
											<div class="col-xs-1">
												<!-- sidebar left -->
											</div>
											<div class="col-xs-10">
													<div class="row">
														<div class="col-xs-6">
															<label for="namestore"><span id="required">* </span>Name Store:</label>
															<input class="form-control"  type="text" id="namestore" name="namestore" value="<?php echo $row['namestore']; ?>" required>
														</div>
														<div class="col-xs-3">
														<label for="store_status"><span id="required">* </span>Status: </label>
														<select class="form-control" name="store_status" id="store_status">
																<option value="open" <?php if ($row['store_status']=='open') {echo "selected";} ?>>Open</option>
																<option value="close" <?php if ($row['store_status']=='close') {echo "selected";} ?>>Close</option>
																<option value="no_existing" <?php if ($row['store_status']=='no_existing') {echo "selected";} ?>>No-Existing</option>
																<option value="existing" <?php if ($row['store_status']=='existing') {echo "selected";} ?>>Existing</option>
														</select>
														<!-- <input class="form-control"  type="text" id="state" name="state" placeholder=""   required> -->
														</div>
														<div class="col-xs-3">
															<label for="franchise_available">Franchise available</label>
															<input class="form-control"  type="checkbox" id="franchise_available" name="franchise_available"  value="yes" <?php if ($row['franchise_available']=='yes') {echo "checked";} ?>  >
														</div>
													</div>
													<div class="col-xs-12">
													<div class="row">
														<label for="store_description">Store description:</label>
														<textarea class="form-control" rows="5" id="store_description" maxlength="1000" name="store_description"><?php echo $row['store_description']; ?></textarea>
													</div>
												  </div>
													<div class="row">
															<div class="col-xs-3">
																<label for="unit">Unit:</label>
																<input  class="form-control" type="number" id="unit" name="unit" placeholder=""  >
															</div>
															<div class="col-xs-3">
																<label for="streetnumber"><span id="required">* </span>Number street:</label>
																<input  class="form-control" type="number" id="streetnumber" name="streetnumber" value="<?php echo $row['streetnumber']; ?>"  required>
															</div>
															<div class="col-xs-6">
																<label for="streetname"><span id="required">* </span>Name street:</label>
																<input  class="form-control" type="text" id="streetname" name="streetname" value="<?php echo $row['streetnumber']; ?>" required >
															</div>
													</div>
													<div class="row">
															<div class="col-xs-6">
																	<label for="suburb"><span id="required">* </span>Suburb or City:</label>
																	<input class="form-control"  type="text" id="suburb" name="suburb" value="<?php echo $row['suburb']; ?>" required>
															</div>
															<div class="col-xs-3">
															<label for="state"><span id="required">* </span>State:</label>
															<select class="form-control" name="state" id="state">
																  <option value="NSW">NSW</option>
																  <option value="VIC">VIC</option>
																  <option value="QLD">QLD</option>
																  <option value="WA">WA</option>
																	<option value="SA">SA</option>
																	<option value="TAS">TAS</option>
																	<option value="NT">NT</option>
															</select>
															<!-- <input class="form-control"  type="text" id="state" name="state" placeholder=""   required> -->
															</div>
															<div class="col-xs-3">
															<label for="postcode"><span id="required">* </span>Postcode:</label>
															<input class="form-control"  type="number" minlength="4" maxlength="4" id="postcode" name="postcode" value="<?php echo $row['postcode']; ?>"   required>
															</div>
													</div>
													<div class="row">
															<div class="col-xs-6">
																<label for="website"><span id="required">* </span>Website:</label>
																<input  class="form-control" type="text" id="website" name="website" value="<?php echo $row['website']; ?>"  required>

															</div>
															<div class="col-xs-6">
																<label for="email"><span id="required">* </span>Email:</label>
																<input class="form-control"  type="email" id="email" name="email" value="<?php echo $row['email']; ?>"   required>
															</div>
													</div>
													<div class="row">
															<div class="col-xs-6">
																<label for="phone1">Phone 1:</label>
																<input class="form-control"  type="number" minlength="5" maxlength="10" id="phone1" name="phone1" value="<?php echo $row['phone1']; ?>"  >
															</div>
															<div class="col-xs-6">
																<label for="phone2">Phone 2:</label>
																<input class="form-control"  type="number" minlength="10" maxlength="10" id="phone2" name="phone2" value="<?php echo $row['phone2']; ?>"  >
															</div>
													</div>
													<div class="row">
															<div class="col-xs-4">
																<!-- <label for="Role"><span id="required">* </span>Status:</label><br>
																<label class="radio-inline"><input type="radio" name="Role" value="member" checked='checked'>Opportunity</label>

																<label class="radio-inline"><input type="radio" name="store_status" value="administrator" >Open</label>
																<label class="radio-inline"><input type="radio" name="store_status" value="administrator" >Close</label>
																<label class="radio-inline"><input type="radio" name="store_status" value="administrator" >Existing</label>
																<label class="radio-inline"><input type="radio" name="store_status" value="administrator" >No-Existing</label>
			 -->

															</div>
															<div class="col-xs-2">

															</div>
															<div class="col-xs-6">
																<label for="filetoupload">Image:</label>
																<input class="form-control" type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg">
																<!-- <input class="form-control"  type="text" id="Image" name="Image" placeholder=""  > -->
															</div>
													</div>
													<div class="row">
														<div class="col-xs-6">


														</div>
														<div class="col-xs-6">
															<input  type="hidden" name="storeID" value="<?php echo $storeID; ?>"  >
															<button type="submit" class="btn btn-warning" name="store_edit_process" >Update</button>
														</div>
													</div>
											</div>
											<div class="col-xs-1">
												<!-- sidebar rigth -->
											</div>
										</div>
							</form>
						</fieldset>
						</div>
						<div class="col-xs-2"></div>
					</div>
					<script>
					$("#login_form").validate();
					</script>


				<?php
					include ('footer.php');
			}
}
?>
