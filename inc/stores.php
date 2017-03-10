<?php
ob_start();
if(!isset($_SESSION)) {
     session_start();
}
include ('../lib/conn.php');


// verificar si el usuario esta logiado

if (isset($_SESSION['logged_userID'])){

	// after confirm to update by modal, then start the process to update in DB
	if (isset($_POST['confirmed_store_update'])){

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

		$storeID = mysqli_real_escape_string($conn, $_POST['storeID']);
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

		$sql = "UPDATE stores
		SET namestore = '$namestore', unit = '$unit', streetnumber = '$streetnumber',
		streetname = '$streetname', suburb = '$suburb',
		state = '$state', postcode = '$postcode',website = '$website',
		email = '$email', phone1 = '$phone1', phone2 = '$phone2',
		store_description = '$store_description',store_status = '$store_status',franchise_available = '$franchise_available',
		update_datestamp = '$update_datestamp', img_path = '$img_path'
		WHERE storeID = $storeID ";
		$result = mysqli_query($conn, $sql);


		// header("location:stores.php");

	}
	// after confirm to delete, this is last process for delete
	if (isset($_POST['confirmed_delete_store'])){
		$storeID = mysqli_real_escape_string($conn, $_POST['storeID']);

		$sql = "DELETE FROM stores WHERE  storeID = '$storeID'";
		echo $sql;
		$result = mysqli_query($conn, $sql);
		header("location:stores.php");
	}


	// process for insert new record
	if (isset($_POST['add_new_store'])){


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
		$join_datestamp = date("Y-m-d h:i:sa");

		$sql = "INSERT INTO stores (namestore, unit, streetnumber, streetname, suburb, state, postcode, website, email, phone1, phone2, join_datestamp, update_datestamp, img_path, store_description, store_status, franchise_available)
		VALUES ('$namestore','$unit', '$streetnumber','$streetname','$suburb','$state','$postcode','$website','$email','$phone1','$phone2','$join_datestamp','$join_datestamp','$img_path','$store_description', '$store_status','$franchise_available') "; //SQL query

		$result = mysqli_query($conn, $sql);


	  header("location:stores.php");
	}

// if not have any POST for delete, update or insert - show the table with the current records
	else {
				// $storeID=$_SESSION['logged_storeID'];
				include ('header.php');
				?>
				<div class="row">
					<div class="col-xs-12">
							<fieldset>
										<legend>Stores</legend>

											<script>
											$(document).ready(function() {
											    $('#DataTables').DataTable();
											} );
											</script>
										<?php
										$sql = "SELECT * FROM  stores";
										$result = mysqli_query($conn, $sql);
										$count = mysqli_num_rows($result);
										if ($count >= 1){
											?>
											<button type="button"  id="btnhiddencolumns"onclick="mobilehiddencolumns()"><span class="glyphicon glyphicon-resize-small"></button>
										  <button type="button" id="btnshowcolumns" onclick="mobileshowcolumns()"><span class="glyphicon glyphicon-resize-full"></button>
											<table id="DataTables" class="table table-striped table-bordered" cellspacing="0" width="100%">
											 <thead>
												<tr>
													<th id='headcolumn0'>Name</th>
													<th id='headcolumn1'>Status</th>
                          <th id='headcolumn2'>State</th>
													<th id='headcolumn3'>Address</th>
													<th id='headcolumn4'>Postcode</th>
													<th id='headcolumn5'>Phone</th>
													<th id='headcolumn6'>Email</th>
                          <th id='headcolumn7'>Store description</th>
													<th id='headcolumn0'>Action</th>
												</tr>
											 </thead>
											 <tbody>
											 <?php
											 foreach ($result as $row) {
									       echo '<tr>';
									         echo "<td  id='bodycolumn0'>". $row['namestore'] ."</td>";
									         echo "<td  id='bodycolumn1'>". $row['store_status']. "</td>";
                           echo "<td  id='bodycolumn2'>". $row['state']. "</td>";
									         echo "<td  id='bodycolumn3'>". $row['streetnumber']. $row['streetname']. $row['suburb']. "</td>";
													 echo "<td  id='bodycolumn4'>". $row['postcode']. "</td>";
													 echo "<td  id='bodycolumn5'>". $row['phone1']. "</td>";
													 echo "<td  id='bodycolumn6'>". $row['email']. "</td>";
                           echo "<td  id='bodycolumn7'>". $row['store_description'] ."</td>";
													 echo "<td  id='bodycolumn0'>";
													 echo "<a href='stores.php?upd_storeID=".$row['storeID']."' name='store_update' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Update</a> ";
													 echo " <a href='stores.php?del_storeID=".$row['storeID']."' name='store_delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";
													 echo "</td>";
									       echo '</tr>';
											 }
											 ?>
										  </tbody>
										 </table>
										 <script src="../js/mobilecolumnsTables.js"></script>
											<?php
										}
										else {
											// echo "No records";
										}
										// END of print records from Database
										?>
										<?php
										// if the user want to update the record, just show the modal windows with the current data and then send the POST data.
										if  (isset($_GET['upd_storeID'])){
											$storeID = mysqli_real_escape_string($conn, $_GET['upd_storeID']);
											$sql = "SELECT * FROM stores WHERE storeID = '$storeID'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											$count = mysqli_num_rows($result);
												if ($count == 1){
													$current_namestore = $row['namestore'];
													$current_unit = $row['unit'];
													$current_streetnumber = $row['streetnumber'];
													$current_streetname = $row['streetname'];
													$current_suburb = $row['suburb'];
													$current_state = $row['state'];
													$current_postcode = $row['postcode'];
													$current_website = $row['website'];
													$current_email = $row['email'];
													$current_phone1 = $row['phone1'];
													$current_phone2 = $row['phone2'];
													$current_store_description= $row['store_description'];
													$current_store_status = $row['store_status'];
													$current_franchise_available = $row['franchise_available'];
												}
												?>
												<body onLoad="$('#UpdateModal').modal('show');"></body>
												<!-- Modal -->
													<div class="modal fade" id="UpdateModal" role="dialog">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">  Update store </h4>
																</div>
																<div class="modal-body">
																	<form name="update_store_form" id="update_store_form" method="post" action="stores.php" enctype="multipart/form-data" >
																		<div class="form-group">
																			<div class="col-xs-12">
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
																								<input  class="form-control" type="number" id="unit" name="unit" value="<?php echo $row['unit']; ?>" placeholder=""  >
																							</div>
																							<div class="col-xs-3">
																								<label for="streetnumber"><span id="required">* </span>Number street:</label>
																								<input  class="form-control" type="number" id="streetnumber" name="streetnumber" value="<?php echo $row['streetnumber']; ?>"  required>
																							</div>
																							<div class="col-xs-6">
																								<label for="streetname"><span id="required">* </span>Name street:</label>
																								<input  class="form-control" type="text" id="streetname" name="streetname" value="<?php echo $row['streetname']; ?>" required >
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
																									<option value="QLD">QLD</option>
																									<option value="NSW">NSW</option>
																									<option value="VIC">VIC</option>
																									<option value="SA">SA</option>
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

																						</div>
																					</div>
																			</div>
																			</div>
																</div>
																<div class="modal-footer">

																			<button type="submit" class="btn btn-primary" name="confirmed_store_update" ><span class='glyphicon glyphicon-pencil'></span>Update</button>

																	</form>
																	<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
											<?php

											?>
											<!-- End modal update-->
											<?php
										}


										// if user require delete any record, just the user need to confirm witn the modal windows.
										if  (isset($_GET['del_storeID'])){
											$storeID = mysqli_real_escape_string($conn, $_GET['del_storeID']);
											?>

											<body onLoad="$('#DeleteModal').modal('show');"></body>
											<!-- Modal -->
												<div class="modal fade" id="DeleteModal" role="dialog">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
																<h4 class="modal-title">  Delete store </h4>
															</div>
															<div class="modal-body">
															</div>
															<div class="modal-footer">
																<form name="delete_store_form" id="delete_store_form" method="post" action="stores.php" >
																		<p>The delete store</p>
																		<input type="hidden" name="storeID" id="storeID" value="<?php echo $storeID; ?>">
																		<button type="submit" name="confirmed_delete_store" class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>Confirm</button>
																</form>
																<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											<!-- End modal delete -->
											<?php
										}
										?>

										<!-- if the user want to create a new record with this button can display a form -->
										<button type="button"  data-toggle="collapse" data-target="#new_registe" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span> New store</button>
										<div id="new_registe" class="collapse">
											<form name="store_form" id="store_form" method="post" action="stores.php" enctype="multipart/form-data">
												<div class="form-group">
																</br>
																<div class="row">
																	<div class="col-xs-12 col-sm-6">
																		<label for="namestore"><span id="required">* </span>Store Name:</label>
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
																		<button type="submit" class="btn btn-warning" name="add_new_store" >Add</button>
																	</div>
																</div>
													</div>
												</div>
									  </form>

							</fieldset>
						</div>
					</div>
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
