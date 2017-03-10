<?php
ob_start();
session_start();
include ('../lib/conn.php');


// verificar si el usuario esta logiado

if (isset($_SESSION['logged_userID'])){

	// after confirm to update by modal, then start the process to update in DB
	if (isset($_POST['confirmed_supply_update'])){

		$supplyID = mysqli_real_escape_string($conn, $_POST['supplyID']);
		$supply_name = mysqli_real_escape_string($conn, $_POST['supply_name']);
		$supply_description = mysqli_real_escape_string($conn, $_POST['supply_description']);
		$supply_price = mysqli_real_escape_string($conn, $_POST['supply_price']);
		if (isset($_POST['supply_available'])){
				$supply_available = mysqli_real_escape_string($conn, $_POST['supply_available']);
		}
		else {
				$supply_available = 'no';
		}


		$update_datestamp = date("Y-m-d h:i:sa");
		$sql = "UPDATE supplies SET supply_name = '$supply_name', supply_description = '$supply_description', supply_price = '$supply_price',supply_available = '$supply_available', update_datestamp = '$update_datestamp'
		WHERE supplyID = $supplyID ";
		$result = mysqli_query($conn, $sql);

		header("location:supplies.php");

	}
	// after confirm to delete, this is last process for delete
	if (isset($_POST['confirmed_delete_supply'])){
		$supplyID = mysqli_real_escape_string($conn, $_POST['supplyID']);

		$sql = "DELETE FROM supplies WHERE  supplyID = '$supplyID'";
		$result = mysqli_query($conn, $sql);
		header("location:supplies.php");
	}


	// process for insert new record
	if (isset($_POST['add_supply'])){
		$supply_name = mysqli_real_escape_string($conn, $_POST['supply_name']);
	  $supply_description = mysqli_real_escape_string($conn, $_POST['supply_comments']);
	  $supply_price = mysqli_real_escape_string($conn, $_POST['supply_price']);
		$supply_available = mysqli_real_escape_string($conn, $_POST['supply_available']);
	  $create_datestamp = date("Y-m-d h:i:sa");
		$update_datestamp = date("Y-m-d h:i:sa");


	  $sql = "INSERT INTO supplies (supply_name,supply_description, supply_price,supply_available,create_datestamp, update_datestamp)
	  VALUES ('$supply_name','$supply_description', '$supply_price','$supply_available','$create_datestamp', '$update_datestamp') ";
		$result = mysqli_query($conn, $sql);
	  header("location:supplies.php");
	}

// if not have any POST for delete, update or insert - show the table with the current records
	else {

				include ('header.php');
				?>
				<div class="row">
					<div class="col-xs-12">
							<fieldset>
										<legend>Supplies services</legend>
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<script>
											$(document).ready(function() {
											    $('#DataTables').DataTable();
											} );
											</script>
										<?php

										$sql = "SELECT * FROM  supplies";
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
													<th id='headcolumn1'>Description</th>
													<th id='headcolumn2'>Price</th>
													<th id='headcolumn3'>Available</th>
													<th id='headcolumn4'>Action</th>
												</tr>
											 </thead>
											 <tbody>
											 <?php
											 foreach ($result as $row) {
									       echo '<tr>';
									         echo "<td  id='bodycolumn0'>". $row['supply_name'] ."</td>";
									         echo "<td  id='bodycolumn1'>". $row['supply_description'] ."</td>";
									         echo "<td  id='bodycolumn2'>". $row['supply_price']. "</td>";
													 echo "<td  id='bodycolumn3'>". $row['supply_available']. "</td>";
													 echo "<td  id='bodycolumn4'>";
													 echo "<a href='supplies.php?upd_supplyID=".$row['supplyID']."' name='supply_update' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Update</a> ";
													 echo " <a href='supplies.php?del_supplyID=".$row['supplyID']."' name='supply_delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";
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
										if  (isset($_GET['upd_supplyID'])){
											$supplyID = mysqli_real_escape_string($conn, $_GET['upd_supplyID']);
											$sql = "SELECT * FROM supplies WHERE supplyID = '$supplyID'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											$count = mysqli_num_rows($result);
												if ($count == 1){
													$currentsupplyname = $row['supply_name'];
													$current_supplydescription = $row['supply_description'];
													$current_supplyprice = $row['supply_price'];
													$current_supply_available = $row['supply_available'];
												}
												?>
												<body onLoad="$('#UpdateModal').modal('show');"></body>
												<!-- Modal -->
													<div class="modal fade" id="UpdateModal" role="dialog">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">  Update supply </h4>
																</div>
																<div class="modal-body">
																	<form name="update_supply_form" id="update_supply_form" method="post" action="supplies.php" >
																		<div class="form-group">
																					<label for="supply_name"><span id="required">* </span>Supply Name</label>
																					<input class="form-control"  type="text" id="supply_name" name="supply_name" value="<?php echo $currentsupplyname;?>" placeholder="" required>
																						<label for="supply_description">Description:</label>
																						<textarea class="form-control" rows="5" id="supply_description" maxlength="1000" name="supply_description"><?php	echo $current_supplydescription; ?></textarea>
																						<label for="supply_price"><span id="required">* </span>Supply price</label>
																						<input class="form-control"  type="text" id="supply_price" name="supply_price" value="<?php echo $current_supplyprice;?>" placeholder="" required>
																						<label for="supply_available">Supply available</label>
																						<input class="form-control"  type="checkbox" id="supply_available" name="supply_available"  value="yes" <?php  if($current_supply_available=='yes'){echo 'checked';} ?>   >
																					 <div class="row">
																						<div class="col-xs-6">

																						</div>
																					</div>
																			</div>
																</div>
																<div class="modal-footer">
																			<input type="hidden" name="supplyID" id="supplyID" value="<?php echo $supplyID; ?>">
																			<button type="submit" class="btn btn-primary" name="confirmed_supply_update" ><span class='glyphicon glyphicon-pencil'></span>Update</button>

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
										<button type="button"  data-toggle="collapse" data-target="#new_registe" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span> New supply</button>
										<div id="new_registe" class="collapse">
											<form name="supply_form" id="supply_form" method="post" action="supplies.php">
												<div class="form-group">
																</br>
																<label for="supply_name"><span id="required">* </span>Supply Name:</label>
																<input class="form-control"  type="text" id="supply_name" name="supply_name" placeholder="" required>
																<label for="supply_comments">Description:</label>
																<textarea class="form-control" rows="5" id="supply_comments" maxlength="1000" name="supply_comments"></textarea>
																<label for="supply_price"><span id="required">* </span>Price</label>
																<input class="form-control"  type="text" id="supply_price" name="supply_price" placeholder="" required>
																<label for="supply_available">Supply available</label>
																<input class="form-control"  type="checkbox" id="supply_available" name="supply_available"  value="yes"   >
													     <div class="row">
																<div class="col-xs-6">
																	<button type="submit" class="btn btn-warning" name="add_supply" >Add</button>
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
