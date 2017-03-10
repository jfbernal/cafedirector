<?php
ob_start();
session_start();
include ('../lib/conn.php');


// verificar si el usuario esta logiado

if (isset($_SESSION['logged_userID'])){

	// after confirm to update by modal, then start the process to update in DB
	if (isset($_POST['confirmed_training_update'])){

		$training_requestID = mysqli_real_escape_string($conn, $_POST['training_requestID']);
		$trainingID = mysqli_real_escape_string($conn, $_POST['trainingID']);
		$training_comments = mysqli_real_escape_string($conn, $_POST['training_comments']);
		$training_userID = mysqli_real_escape_string($conn, $_POST['training_userID']);
		$training_date = mysqli_real_escape_string($conn, $_POST['training_date']);
		$storeID=$_SESSION['logged_storeID'];
		$update_datestamp = date("Y-m-d h:i:sa");
		$sql = "UPDATE training_requests SET trainingID = '$trainingID', comment = '$training_comments', userID = '$training_userID',date_request = '$training_date',storeID = '$storeID', update_datestamp = '$update_datestamp'
		WHERE training_requestID = $training_requestID ";
		$result = mysqli_query($conn, $sql);
		header("location:request_training.php");

	}
	// after confirm to delete, this is last process for delete
	if (isset($_POST['confirmed_delete_training'])){
		$training_requestID = mysqli_real_escape_string($conn, $_POST['training_requestID']);
		$storeID = $_SESSION['logged_storeID'];
		$sql = "DELETE FROM training_requests WHERE  training_requestID = '$training_requestID' AND storeID = '$storeID'";
		$result = mysqli_query($conn, $sql);
		header("location:request_training.php");
	}


	// process for insert new record
	if (isset($_POST['new_training'])){
		$trainingID = mysqli_real_escape_string($conn, $_POST['trainingID']);
	  $training_comments = mysqli_real_escape_string($conn, $_POST['training_comments']);
	  $training_userID = mysqli_real_escape_string($conn, $_POST['training_userID']);
		$training_date = mysqli_real_escape_string($conn, $_POST['training_date']);
	  $create_datestamp = date("Y-m-d h:i:sa");
		$storeID=$_SESSION['logged_storeID'];
		$training_status = "pending";
	  $sql = "INSERT INTO training_requests (trainingID, comment, userID, date_request , create_datestamp, storeID, training_status)
	  VALUES ('$trainingID','$training_comments', '$training_userID','$training_date','$create_datestamp', '$storeID','$training_status') ";
		$result = mysqli_query($conn, $sql);
	  header("location:request_training.php");
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
										if (isset($_SESSION['logged_storeID'])){
												$storeID=$_SESSION['logged_storeID'];
												$sql = "SELECT * FROM  training_requests
												JOIN trainings ON trainings.trainingID= training_requests.trainingID
												WHERE storeID = '$storeID'";
										}
										else {
												$sql = "SELECT * FROM  training_requests
												JOIN trainings ON trainings.trainingID= training_requests.trainingID
												JOIN stores ON training_requests.storeID= stores.storeID";
										}
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
													<?php
													if (!isset($_SESSION['logged_storeID'])){
														echo "<th id='headcolumn0'>Store</th>";
													}
													?>
													<th id='headcolumn1'>Status</th>
													<th id='headcolumn2'>Description</th>
													<th id='headcolumn0'>Action</th>
												</tr>
											 </thead>
											 <tbody>
											 <?php
											 foreach ($result as $row) {
									       echo '<tr>';
									         echo "<td  id='bodycolumn0'>". $row['trainingname'] ."</td>";
													 if (!isset($_SESSION['logged_storeID'])){
 														echo "<td  id='bodycolumn0'>". $row['namestore'] ."</td>";
 													 }
													 echo "<td  id='bodycolumn1'>". $row['training_status']. "</td>";
													 echo "<td  id='bodycolumn2'>". $row['comment'] ."</td>";

													 echo "<td  id='bodycolumn0'>";
													 echo "<a href='request_training.php?upd_trainingID=".$row['training_requestID']."' name='training_update' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Update</a> ";
													 echo " <a href='request_training.php?del_trainingID=".$row['training_requestID']."' name='training_delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";

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
											$training_requestID = mysqli_real_escape_string($conn, $_GET['upd_trainingID']);
											$sql = "SELECT * FROM training_requests WHERE training_requestID = '$training_requestID'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											$count = mysqli_num_rows($result);
											if ($row['storeID']==$_SESSION['logged_storeID']){
												if ($count == 1){
													$current_trainingID = $row['trainingID'];
													$current_training_comments = $row['comment'];
													$current_userID = $row['userID'];
													$current_training_date = $row['date_request'];
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
																	<form name="update_training_form" id="update_training_form" method="post" action="request_training.php" >
																		<div class="form-group">

																						<label for="trainingID"><span id="required">* </span>Type:</label>
																						<select class="form-control" name="trainingID">
																						<?php
																							$sql = "SELECT * FROM trainings ";
																							$result = mysqli_query($conn, $sql);

																							foreach ($result as $row) {
																								if ($row['trainingID']==$current_trainingID){
																										echo "<option value='".$row['trainingID']."' selected>". $row['trainingname']."</option>";
																								}
																								else {
																										echo "<option value='".$row['trainingID']."'>". $row['trainingname']."</option>";
																								}
																							}
																						?>
																						</select>
																						<label for="training_comments">Additional information:</label>
																						<textarea class="form-control" rows="5" id="training_comments" maxlength="1000" name="training_comments"><?php	echo $current_training_comments; ?></textarea>
																							<label for="training_userID"><span id="required">* </span>Staff:</label>
																							<select class="form-control" name="training_userID">
																							<?php
																								$sql = "SELECT * FROM users WHERE storeID ='$storeID'";
																								$result = mysqli_query($conn, $sql);
																								foreach ($result as $row) {
																									if ($row['userID']==$current_userID){
																											echo "<option value='". $row['userID']."' selected>". $row['username']."</option>";
																									}
																									else {
																											echo "<option value='". $row['userID']."'>". $row['username']."</option>";
																									}
																								}
																							?>
																							</select>
																									<label for="training_date">When are you looking:</label>
																									<input  class="form-control" type="date" id="training_date" name="training_date" value="<?php	echo $current_training_date; ?>" placeholder="" required >
																					 <div class="row">
																						<div class="col-xs-6">

																						</div>
																					</div>
																			</div>
																</div>
																<div class="modal-footer">
																			<input type="hidden" name="training_requestID" id="training_requestID" value="<?php echo $training_requestID; ?>">
																			<button type="submit" class="btn btn-primary" name="confirmed_training_update" ><span class='glyphicon glyphicon-pencil'></span>Update</button>

																	</form>
																	<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
											<?php
											}
											else {
												// echo "error store";
											}
											?>
											<!-- End modal update-->
											<?php
										}

										// if user require delete any record, just the user need to confirm witn the modal windows.
										if  (isset($_GET['del_trainingID'])){
											$training_requestID = mysqli_real_escape_string($conn, $_GET['del_trainingID']);
											?>

											<body onLoad="$('#DeleteModal').modal('show');"></body>
											<!-- Modal -->
												<div class="modal fade" id="DeleteModal" role="dialog">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
																<h4 class="modal-title">  Delete training </h4>
															</div>
															<div class="modal-body">
															</div>
															<div class="modal-footer">
																<form name="delete_training_form" id="delete_training_form" method="post" action="request_training.php" >
																		<p>The delete training</p>
																		<input type="hidden" name="training_requestID" id="training_requestID" value="<?php echo $training_requestID; ?>">
																		<button type="submit" name="confirmed_delete_training" class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>Confirm</button>
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
										<button type="button"  data-toggle="collapse" data-target="#new_registe" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span> New request</button>
										<div id="new_registe" class="collapse">
											<form name="training_request_form" id="training_request_form" method="post" action="request_training.php">
												<div class="form-group">

																<label for="trainingID"><span id="required">* </span>Type:</label>
																<select class="form-control" name="trainingID">
																<?php
																	$sql = "SELECT * FROM trainings ";
																	$result = mysqli_query($conn, $sql);
																	foreach ($result as $row) {
																		echo "<option value='".$row['trainingID']."'>". $row['trainingname']."</option>";
																	}
																?>
																</select>
																<label for="training_comments">Additional information:</label>
																<textarea class="form-control" rows="5" id="training_comments" maxlength="1000" name="training_comments"></textarea>
																	<label for="training_userID"><span id="required">* </span>Staff:</label>
																	<select class="form-control" name="training_userID">
																	<?php
																		$sql = "SELECT * FROM users WHERE storeID ='$storeID'";
																		$result = mysqli_query($conn, $sql);
																		foreach ($result as $row) {
																			echo "<option value='". $row['userID']."'>". $row['username']."</option>";
																		}
																	?>
																	</select>
																			<label for="training_date">When are you looking:</label>
																			<input  class="form-control" type="date" id="training_date" name="training_date" placeholder="" required >
													     <div class="row">
																<div class="col-xs-6">
																	<button type="submit" class="btn btn-warning" name="new_training" >Send</button>
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
