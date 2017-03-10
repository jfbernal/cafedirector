<?php
ob_start();
session_start();
include ('../lib/conn.php');
// verificar si el usuario esta logiado

if (isset($_SESSION['logged_userID'])){

	// after confirm to update by modal, then start the process to update in DB
	if (isset($_POST['confirmed_order_update'])){

		$order_supplyID = mysqli_real_escape_string($conn, $_POST['order_supplyID']);
		$supplyID = mysqli_real_escape_string($conn, $_POST['supplyID']);
		$comments = mysqli_real_escape_string($conn, $_POST['comments']);
		$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
		$date_order = mysqli_real_escape_string($conn, $_POST['date_order']);
		$storeID=$_SESSION['logged_storeID'];
		$update_datestamp = date("Y-m-d h:i:sa");
		$sql = "UPDATE order_supplies SET supplyID = '$supplyID', comment = '$comments', quantity = '$quantity',date_order = '$date_order',storeID = '$storeID', update_datestamp = '$update_datestamp'
		WHERE order_supplyID = $order_supplyID ";
		$result = mysqli_query($conn, $sql);
		header("location:order_supplies.php");

	}
	// after confirm to delete, this is last process for delete
	if (isset($_POST['confirmed_delete_order'])){
		$order_supplyID = mysqli_real_escape_string($conn, $_POST['order_supplyID']);
		$storeID = $_SESSION['logged_storeID'];
		$sql = "DELETE FROM order_supplies WHERE  order_supplyID = '$order_supplyID' AND storeID = '$storeID'";
		$result = mysqli_query($conn, $sql);
		header("location:order_supplies.php");
	}


	// process for insert new record
	if (isset($_POST['new_order_supplies'])){
		$supplyID = mysqli_real_escape_string($conn, $_POST['supplyID']);
	  $comment = mysqli_real_escape_string($conn, $_POST['comment']);
	  $userID = mysqli_real_escape_string($conn, $_POST['userID']);
		$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
		$date_order = mysqli_real_escape_string($conn, $_POST['date_order']);
		$storeID=$_SESSION['logged_storeID'];
		$create_datestamp = date("Y-m-d h:i:sa");
		$order_status = "pending";
	  $sql = "INSERT INTO order_supplies (supplyID, comment, userID, quantity , date_order, storeID, create_datestamp,order_status)
	  VALUES ('$supplyID','$comment', '$userID','$quantity','$date_order', '$storeID','$create_datestamp','$order_status') ";

		$result = mysqli_query($conn, $sql);
	  header("location:order_supplies.php");
	}

// if not have any POST for delete, update or insert - show the table with the current records
	else {

				include ('header.php');
				?>
				<div class="row">
					<div class="col-xs-12">
							<fieldset>
										<legend>Order supplies</legend>
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<script>
											$(document).ready(function() {
											    $('#DataTables').DataTable();
											} );
											</script>
										<?php
										if (isset($_SESSION['logged_storeID'])){
											$storeID=$_SESSION['logged_storeID'];
											$sql = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID WHERE storeID = '$storeID'";
										}
										else {
											$sql = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID";
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
													<th id='headcolumn0'>Item names</th>
													<th id='headcolumn1'>Quantity</th>
													<th id='headcolumn1'>Order date</th>
													<th id='headcolumn2'>Status</th>
													<th id='headcolumn3'>Action</th>
												</tr>
											 </thead>
											 <tbody>
											 <?php
											 foreach ($result as $row) {
									       echo '<tr>';
									         echo "<td  id='bodycolumn0'>". $row['supply_name'] ."</td>";
									         echo "<td  id='bodycolumn1'>". $row['comment'] ."</td>";
									         echo "<td  id='bodycolumn2'>". $row['date_order']. "</td>";
													 echo "<td  id='bodycolumn2'>". $row['order_status']. "</td>";
													 echo "<td  id='bodycolumn3'>";
													 echo "<a href='order_supplies.php?upd_order_supplyID=".$row['order_supplyID']."' name='orders_update' class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Update</a> ";
													 echo " <a href='order_supplies.php?del_order_supplyID=".$row['order_supplyID']."' name='orders_delete' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a>";

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
										if  (isset($_GET['upd_order_supplyID'])){
											$order_supplyID = mysqli_real_escape_string($conn, $_GET['upd_order_supplyID']);
											$sql = "SELECT * FROM order_supplies WHERE order_supplyID = '$order_supplyID'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_array($result);
											$count = mysqli_num_rows($result);
											if ($row['storeID']==$_SESSION['logged_storeID']){
												if ($count == 1){
													$current_supplyID = $row['supplyID'];
													$current_supply_comments = $row['comment'];
													$current_userID = $row['userID'];
													$current_quantity = $row['quantity'];
													$current_date_order = $row['date_order'];
												}
												?>
												<body onLoad="$('#UpdateModal').modal('show');"></body>
												<!-- Modal -->
													<div class="modal fade" id="UpdateModal" role="dialog">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">  Update order </h4>
																</div>
																<div class="modal-body">
																	<form name="update_order_form" id="update_order_form" method="post" action="order_supplies.php" >
																		<div class="form-group">

																						<label for="supplyID"><span id="required">* </span>Type:</label>
																						<select class="form-control" name="supplyID">
																						<?php
																							$sql = "SELECT * FROM supplies ";
																							$result = mysqli_query($conn, $sql);

																							foreach ($result as $row) {
																								if ($row['supplyID']==$current_supplyID){
																										echo "<option value='".$row['supplyID']."' selected>". $row['supply_name']."</option>";
																								}
																								else {
																										echo "<option value='".$row['supplyID']."'>". $row['supply_name']."</option>";
																								}
																							}
																						?>
																						</select>
																						<label for="comments">Additional information:</label>
																						<textarea class="form-control" rows="5" id="comments" maxlength="1000" name="comments"><?php	echo $current_supply_comments; ?></textarea>
																						<label for="quantity">Quantity:</label>
																						<input  class="form-control" type="number" id="quantity" name="quantity" value="<?php	echo $current_quantity; ?>" placeholder="" required >
																						<label for="date_order">When are you looking:</label>
																						<input  class="form-control" type="date" id="date_order" name="date_order" value="<?php	echo $current_date_order; ?>" placeholder="" required >
																					 <div class="row">
																						<div class="col-xs-6">

																						</div>
																					</div>
																			</div>
																</div>
																<div class="modal-footer">
																			<input type="hidden" name="order_supplyID" id="order_supplyID" value="<?php echo $order_supplyID; ?>">
																			<button type="submit" class="btn btn-primary" name="confirmed_order_update" ><span class='glyphicon glyphicon-pencil'></span>Update</button>

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
										if  (isset($_GET['del_order_supplyID'])){
											$order_supplyID = mysqli_real_escape_string($conn, $_GET['del_order_supplyID']);
											?>

											<body onLoad="$('#DeleteModal').modal('show');"></body>
											<!-- Modal -->
												<div class="modal fade" id="DeleteModal" role="dialog">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
																<h4 class="modal-title">  Delete order </h4>
															</div>
															<div class="modal-body">
															</div>
															<div class="modal-footer">
																<form name="delete_order_form" id="delete_order_form" method="post" action="order_supplies.php" >
																		<p>The delete order supply</p>
																		<input type="hidden" name="order_supplyID" id="order_supplyID" value="<?php echo $order_supplyID; ?>">
																		<button type="submit" name="confirmed_delete_order" class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span>Confirm</button>
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
										<button type="button"  data-toggle="collapse" data-target="#new_registe" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span> New order</button>
										<div id="new_registe" class="collapse">
											<form name="order_supplies_form" id="order_supplies_form" method="post" action="order_supplies.php">
												<div class="form-group">
																<?php
																if (!isset($_SESSION['logged_storeID'])){
																	echo "<label for='supplyID'><span id='required'>* </span>Store:</label>";
																	echo "<select class='form-control' name='supplyID'>";

																		$sql = "SELECT * FROM stores ";
																		$result = mysqli_query($conn, $sql);
																		foreach ($result as $row) {
																			echo "<option value='".$row['storeID']."'>". $row['namestore']."</option>";
																		}
																}

																	echo "</select>";
																?>



																<label for="supplyID"><span id="required">* </span>Supply:</label>
																<select class="form-control" name="supplyID">
																<?php
																	$sql = "SELECT * FROM supplies ";
																	$result = mysqli_query($conn, $sql);
																	foreach ($result as $row) {
																		echo "<option value='".$row['supplyID']."'>". $row['supply_name']."</option>";
																	}
																?>
																</select>

																<label for="comment">Additional information:</label>
																<textarea class="form-control" rows="5" id="comment" maxlength="1000" name="comment"></textarea>
																<label for="quantity">Quantity:</label>
																<input  class="form-control" type="number" id="quantity" name="quantity" placeholder="" required >
																<label for="date_order">When are you looking:</label>
																<input  class="form-control" type="date" id="date_order" name="date_order" placeholder="" required >
													     <div class="row">
																<div class="col-xs-6">
																	<button type="submit" class="btn btn-warning" name="new_order_supplies" >Add order</button>
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
