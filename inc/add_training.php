<?php
include ('../lib/login_check.php');
ob_start();
session_start();
?>
<?php
if (isset($_POST['add_new_trainig'])){
	include ('../lib/conn.php');

	$training_name = mysqli_real_escape_string($conn, $_POST['training_name']);
	$trainig_available = mysqli_real_escape_string($conn, $_POST['trainig_available']);
	$training_description = mysqli_real_escape_string($conn, $_POST['training_description']);
	$create_datestamp = date("Y-m-d h:i:sa");
	$update_datestamp = date("Y-m-d h:i:sa");

	$sql = "INSERT INTO trainings (trainingname, trainig_available, trainingdescription, create_datestamp, update_datestamp)
	VALUES ('$training_name','$trainig_available', '$training_description','$create_datestamp','$update_datestamp') "; //SQL query

	$result = mysqli_query($conn, $sql);

	header("location:message.php?successful=resgiter");
}
else {
	include ('header.php');
	?>
	<div class="row">
		<div class="col-xs-12">
			<fieldset>
						<legend>Add Training</legend>
						<!-- Lista de Training -->
						<div class="col-xs-12 col-md-10 col-md-offset-1">
						<table class="table table-striped">
						<thead>
							<tr>
								<th>Training</th>
								<th>Description</th>
								<th>Available</th>
							</tr>
						</thead>
							<tbody>
						<?php
						$sql = "SELECT * FROM trainings";
						$result = mysqli_query($conn, $sql);
						foreach ($result as $row) {
				      echo '<tr>';
				        echo "<td>". $row['trainingname'] ."</td>";
				        echo "<td>". $row['trainingdescription'] ."</td>";
				        echo "<td>". $row['trainig_available']. "</td>";
				      echo '</tr>';

						}
						?>
							</tbody>
			  		</table>
			</div>

						<form name="add_training_form" id="add_training_form" method="post" action="add_training.php">
							<div class="form-group">
								<div class="col-xs-12 col-md-10 col-md-offset-1">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<label for="training_name"><span id="required">* </span>Training Name:</label>
												<input class="form-control"  type="text" id="training_name" name="training_name" placeholder="" required>
											</div>

											<div class="col-xs-6 col-sm-3">
												<label for="trainig_available">Trainig available</label>
												<input class="form-control"  type="checkbox" id="trainig_available" name="trainig_available"  value="1"   >
											</div>
										</div>
										<div class="row">
										<div class="col-xs-12">
											<label for="training_description">Training description:</label>
											<textarea class="form-control" rows="5" id="training_description" maxlength="1000" name="training_description"></textarea>
										</div>
									  </div>

										<div class="row">

											<div class="col-xs-6">
												<button type="submit" class="btn btn-warning" name="add_new_trainig" >Add</button>
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
