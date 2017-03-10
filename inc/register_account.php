<?php
include ('header.php');
?>
<div class="row">

	<div class="col-xs-12">
			<fieldset>
					<legend>Registration</legend>
						<form name="account_form" id="account_form" method="post" action="register_account_process.php">
									<div class="form-group">

										<div class="col-xs-4 col-xs-offset-4">


															<label for="Username">Username:</label>
															<input  class="form-control" type="text" id="Username" name="Username" placeholder="Your username"  required>


															<label for="Password">Password:</label>
															<input  class="form-control" type="password" id="Password" name="Password" placeholder=""  required>


															<label for="ConfirmPassword">Confirm Password:</label>
															<input  class="form-control" type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder=""  required>

													<?php
													if(isset($_SESSION['logged_userID'])){
														if ($_SESSION['logged_role'] == "administrator" || $_SESSION['logged_role'] == "director" || $_SESSION['logged_role'] == "leader" || $_SESSION['logged_role'] == "manager" ){
													?>

														<label for="Role"><span id="required">* </span>Role:</label><br>
														<?php
															if ($_SESSION['logged_role'] == "administrator" ){
																echo "<label class='radio-inline'><input type='radio' name='Role' value='registered' >registered</label>";
															}
														?>

														<?php
															if ($_SESSION['logged_role'] == "administrator" || $_SESSION['logged_role'] == "director" || $_SESSION['logged_role'] == "leader" || $_SESSION['logged_role'] == "manager" ){

																if ($_SESSION['logged_role'] == "manager" ){
																	echo "<label class='radio-inline'><input type='radio' name='Role' value='staff' checked=checked>Staff</label>";
																}
																else {
																	echo "<label class='radio-inline'><input type='radio' name='Role' value='staff' >Staff</label>";
																}
															}

															if ($_SESSION['logged_role'] == "administrator" || $_SESSION['logged_role'] == "director" || $_SESSION['logged_role'] == "leader" ){
																echo "<label class='radio-inline'><input type='radio' name='Role' value='manager' >Manager</label>";
															}
															if ($_SESSION['logged_role'] == "administrator" || $_SESSION['logged_role'] == "director"  ){
																echo "<label class='radio-inline'><input type='radio' name='Role' value='leader' >Leader</label>";
															}
															if ($_SESSION['logged_role'] == "administrator"  ){
																echo "<label class='radio-inline'><input type='radio' name='Role' value='director' >Director</label>";
															}
														?>


													<br>
													<?php
															}
													}
													else {
														echo "<input type='hidden' name='Role' value='registered' >";
													}
													?>

														<?php
															if (isset($_GET['user'])){
																echo  "<font color='red'>". $_GET['user'] . "</font>" . " this username is already taken please choose another one" ;
															}
														?>
															<button type="submit" class="btn btn-warning" id="submit_form" >Next</button>

										</div>

									</div>
				</form>
			</fieldset>
		</div>

</div>
	<script>
		$("#account_form").validate({
			"rules" : {
				"Username" : {
					"minlength" : 4},
				"Password" : {
					"minlength" : 8,
					"required" : true },
				"ConfirmPassword":{
					"equalTo" : "#Password"}
			}
		});
	</script>
<?php
include ('footer.php');
?>
