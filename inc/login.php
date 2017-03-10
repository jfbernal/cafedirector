<?php
	include ('header.php');
?>
<div class="row">
	<!-- <div class="col-xs-2"></div> -->
	<div class="col-xs-12">
			<fieldset>
						<legend>Log In</legend>
						<form name="login_form" id="login_form" method="post" action="login_process.php">
								<div class="form-group">

									<div class="col-xs-4 col-xs-offset-4">
											<!-- <div class="row"> -->
												<label for="Username">Username:</label>
												<input  class="form-control" type="text" id="Username" name="Username" placeholder="" required >
											<!-- </div> -->
											<!-- <div class="row"> -->
												<label for="Password">Password:</label>
												<input  class="form-control" type="password" id="Password" name="Password" placeholder=""  required>
											<!-- </div> -->
											<?php

												if (isset($_GET['invalid_entry'])){
													echo  "<font color='red'> Invalid entry, please login first. </font>" ;
												}
											?>
											
											<!-- <div class="row"> -->
											</br>
												<button type="submit" class="btn btn-warning" id="submit_login_form" name="submit_login_form" >Submit</button>
											<!-- </div> -->

									</div>

								</div>
					 </form>
			</fieldset>
		</div>
		<!-- <div class="col-xs-2"></div> -->
	</div>
	<script>
	$("#login_form").validate();
	</script>
	<?php
	include ('footer.php');
	?>
