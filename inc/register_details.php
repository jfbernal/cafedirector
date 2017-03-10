<?php
	session_start();
	include ('header.php');
?>
<div class="row">

	<div class="col-xs-12">
			<fieldset>
						<legend>Registration - <?php echo $_SESSION['pre_username'];  ?></legend>
						<form name="register_form" id="register_form" method="post" action="register_details_process.php" enctype="multipart/form-data">
							<div class="form-group">

								<div class="col-xs-12 col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<label for="FirstName"><span id="required">* </span>First name:</label>
												<input class="form-control"  type="text" id="FirstName" name="FirstName" placeholder="" required>
											</div>
											<div class="col-xs-12 col-sm-6">
												<label for="LastName"><span id="required">* </span>Last name:</label>
												<input  class="form-control" type="text" id="LastName" name="LastName" placeholder=""   required>
											</div>
										</div>
										<div class="row">
												<div class="col-xs-6 col-sm-3">
													<label for="UnitAddress">Unit:</label>
													<input  class="form-control" type="number" id="UnitAddress" name="UnitAddress" placeholder=""  >
												</div>
												<div class="col-xs-6 col-sm-3">
													<label for="NumberStreet"><span id="required">* </span>Number street:</label>
													<input  class="form-control" type="number" id="NumberStreet" name="NumberStreet" placeholder=""  required>
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="NameStreet"><span id="required">* </span>Name street:</label>
													<input  class="form-control" type="text" id="NameStreet" name="NameStreet" placeholder="name" required >
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
														<label for="Suburb"><span id="required">* </span>Suburb or City:</label>
														<input class="form-control"  type="text" id="Suburb" name="Suburb" placeholder="Suburb"  required>
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="State"><span id="required">* </span>State:</label>
												<select class="form-control" name="State" id="State">
														<option value="NSW">NSW</option>
														<option value="VIC">VIC</option>
														<option value="QLD">QLD</option>
														<option value="WA">WA</option>
														<option value="SA">SA</option>
														<option value="TAS">TAS</option>
														<option value="NT">NT</option>
												</select>
												</div>
												<div class="col-xs-6 col-sm-3">
												<label for="Postcode"><span id="required">* </span>Postcode:</label>
												<input class="form-control"  type="number" minlength="4" maxlength="4" id="Postcode" name="Postcode" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="Country">Country:</label>
													<input class="form-control"  type="text" id="Country" name="Country" placeholder=""   required>
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="Email"><span id="required">* </span>Email:</label>
													<input class="form-control"  type="email" id="Email" name="Email" placeholder=""   required>
												</div>
										</div>
										<div class="row">
												<div class="col-xs-12 col-sm-6">
													<label for="Phone">Phone:</label>
													<input class="form-control"  type="number" minlength="5" maxlength="10" id="Phone" name="Phone" placeholder="" required >
												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="Mobile">Mobile:</label>
													<input class="form-control"  type="number" minlength="9" maxlength="10" id="Mobile" name="Mobile" placeholder=""  >
												</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-4">
												<!-- <div class="col-xs-4"> -->
													<label for="GenderMale"><span id="required">* </span>Gender:</label><br>
													<label class="radio-inline"><input type="radio" id="GenderMale" name="Gender" value="male"  required>Male</label>
													<label class="radio-inline"><input type="radio" id="GenderFemale" name="Gender" value="female" >Female</label>
												</div>
												<div class="col-xs-12 col-sm-2">

												</div>
												<div class="col-xs-12 col-sm-6">
													<label for="filetoupload">Image:</label>
													<input class="form-control" type="file" name="filetoupload" id="filetoupload" accept="image/png, image/gif, image/jpeg">
													<!-- <input class="form-control"  type="text" id="Image" name="Image" placeholder=""  > -->
												</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-xs-offset-4">

												<button type="submit" class="btn btn-warning" id="submit_form" >Submit</button>
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
	?>
