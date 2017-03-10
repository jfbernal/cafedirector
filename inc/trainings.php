<?php
ob_start();
session_start();
include ('../lib/conn.php');


// verificar si el usuario esta logiado

if (isset($_SESSION['logged_userID'])){

	// after confirm to update by modal, then start the process to update in DB
	if (isset($_POST['confirmed_training_update'])){

		$trainingID = mysqli_real_escape_string($conn, $_POST['trainingID']);
		$training_name = mysqli_real_escape_string($conn, $_POST['training_name']);
		$training_description = mysqli_real_escape_string($conn, $_POST['training_description']);
		if (isset($_POST['training_available'])){
				$training_available = mysqli_real_escape_string($conn, $_POST['training_available']);
		}
		else {
				$training_available = 'no';
		}
		$update_datestamp = date("Y-m-d h:i:sa");
		$sql = "UPDATE trainings SET trainingname = '$training_name', trainingdescription = '$training_description', training_available = '$training_available',update_datestamp = '$update_datestamp'
		WHERE trainingID = $trainingID ";
		$result = mysqli_query($conn, $sql);

		// header("location:trainings.php");

	}
	// after confirm to delete, this is last process for delete
	if (isset($_POST['confirmed_delete_supply'])){
		$supplyID = mysqli_real_escape_string($conn, $_POST['supplyID']);

		$sql = "DELETE FROM supplies WHERE  supplyID = '$supplyID'";
		$result = mysqli_query($conn, $sql);
		header("location:supplies.php");
	}


	// process for insert new record
	if (isset($_POST['add_training'])){
		$training_name = mysqli_real_escape_string($conn, $_POST['training_name']);
	  $training_description = mysqli_real_escape_string($conn, $_POST['training_description']);
		$training_available = mysqli_real_escape_string($conn, $_POST['training_available']);
	  $create_datestamp = date("Y-m-d h:i:sa");

	  $sql = "INSERT INTO trainings (trainingname,trainingdescription, training_available,create_datestamp)
	  VALUES ('$training_name','$training_description', '$training_available','$create_datestamp') ";
		$result = mysqli_query($conn, $sql);
	  header("location:trainings.php");
	}

// if not have any POST for delete, update or insert - show the table with the current records
	else {

				include ('header.php');
				?>
				<div class="row">
					<div class="col-xs-12">
							<fieldset>
										<legend>Training services</legend>
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<script>
											$(document).ready(function() {
											    $('#DataTables').DataTable();
											} );
											</script>
										<?php

										$sql = "SELECT * FROM  trainings";
										$result = mysqli_query($conn, $sql);
										$count = mysqli_num_rows($result);

										if ($count >= 1){
											?>
											<button type="button"  id="btnhiddencolumns"onclick="mobilehiddencolumns()"><span class="glyphicon glyphicon-resize-small"></button>
										  <button type="button" id="btnshowcolumns" onclick="mobileshowcolumns()"><span class="glyphicon glyphicon-resize-full"></button>
											<table id="DataTables" class="table table-striped table-bordered" cellspacing="0" width="100%">
											 <thead>
												<tr>
													<th id='headcolumn0'>Training</th>
													<th id='headcolumn1'>Description</th>
													<th id='headcolumn3'>Available</th>
													<th id='headcolumn4'>Action</th>
												</tr>
											 </thead>
											 <tbody>
											 <?php
											 foreach ($result as $row) {
									       echo '<tr>';
									         echo "<td  id='bodycolumn0'>". $row['trainingname'] ."</td>";
									         echo "<td  id='bodycolumn1'>". $row['trainingdescription'] ."</td>";
													 echo "<td  id='bodycolumn3'>". $row['training_available']. "</td>";
													 echo "<td  id='bodycolumn4'>";
													 echo "<a href='trainings.php?upd_trainingID=".$row['trainingID']."' name='training_update' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Update</a> ";
													 echo " <a href='trainings.php?del_trainingID=".$row['trainingID']."' name='training_delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";
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
										if  (isset($_GET['upd_trainingID'])){
											$trainingID = mysqli_real_escape_string($conn, $_GET['upd_trainingID']);
											$sql = "SELECT * FROM trainings WHERE trainingID = '$trainingID'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											$count = mysqli_num_rows($result);
												if ($count == 1){
													$current_trainingname = $row['trainingname'];
													$current_trainingdescription = $row['trainingdescription'];
													$current_training_available = $row['training_available'];
												}
												?>
												<body onLoad="$('#UpdateModal').modal('show');"></body>
												<!-- Modal -->
													<div class="modal fade" id="UpdateModal" role="dialog">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">  Update training </h4>
																</div>
																<div class="modal-body">
																	<form name="update_training_form" id="update_training_form" method="post" action="trainings.php" >
																		<div class="form-group">
																					<label for="training_name"><span id="required">* </span>Training Name</label>
																					<input class="form-control"  type="text" id="training_name" name="training_name" value="<?php echo $current_trainingname;?>" placeholder="" required>
																						<label for="training_description">Description:</label>
																						<textarea class="form-control" rows="5" id="training_description" maxlength="1000" name="training_description"><?php	echo $current_trainingdescription; ?></textarea>
																						<label for="training_available">Training available </label>
																						<input class="form-control"  type="checkbox" id="training_available" name="training_available"   value="yes" <?php  if($current_training_available=='yes'){echo 'checked';} ?>   >
																					 <div class="row">
																						<div class="col-xs-6">

																						</div>
																					</div>
																			</div>
																</div>
																<div class="modal-footer">
																			<input type="hidden" name="trainingID" id="trainingID" value="<?php echo $trainingID; ?>">
																			<button type="submit" class="btn btn-primary" name="confirmed_training_update" ><span class='glyphicon glyphicon-pencil'></span>Update</button>

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
										if  (isset($_GET['del_supplyID'])){
											$supplyID = mysqli_real_escape_string($conn, $_GET['del_supplyID']);
											?>

											<body onLoad="$('#DeleteModal').modal('show');"></body>
											<!-- Modal -->
												<div class="modal fade" id="DeleteModal" role="dialog">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
																<h4 class="modal-title">  Delete supply </h4>
															</div>
															<div class="modal-body">
															</div>
															<div class="modal-footer">
																<form name="delete_supply_form" id="delete_supply_form" method="post" action="supplies.php" >
																		<p>The delete supply</p>
																		<input type="hidden" name="supplyID" id="supplyID" value="<?php echo $supplyID; ?>">
																		<button type="submit" name="confirmed_delete_supply" class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>Confirm</button>
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
										<button type="button"  data-toggle="collapse" data-target="#new_registe" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span> New Training</button>
										<div id="new_registe" class="collapse">
											<form name="training_form" id="training_form" method="post" action="trainings.php">
												<div class="form-group">
																</br>
																<label for="training_name"><span id="required">* </span>Training Name:</label>
																<input class="form-control"  type="text" id="training_name" name="training_name" placeholder="" required>
																<label for="training_description">Description:</label>
																<textarea class="form-control" rows="5" id="training_description" maxlength="1000" name="training_description"></textarea>
																<label for="training_available">Training available</label>
																<input class="form-control"  type="checkbox" id="training_available" name="training_available"  value="yes"   >
													     <div class="row">
																<div class="col-xs-6">
																	<button type="submit" class="btn btn-warning" name="add_training" >Add</button>
																</div>
															</div>
													</div>
												</div>
									  </form>
										</div>
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
