<?php
// include ('login_check.php');
?>
<?php
// session_start();
// include ('inc/conn.php');
include ('header.php');
  $userID = $_SESSION['logged_userID'];
  // $movieID = mysqli_real_escape_string($conn, $_POST['movieID']);
	$sql = "SELECT * FROM users JOIN membership WHERE users.userID='$userID' AND users.membershipID = membership.membershipID;";
  $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
?>
<div class="row">
	<!-- <div class="col-xs-2"></div> -->
	<div class="col-xs-12">
			<fieldset>
						<legend>Profile</legend>

								<div class="form-group">

									<!-- <div class="col-xs-12"> -->
										<div class="row">
													<div class="col-xs-12 col-sm-6">
															<img class="img-responsive" src="<?php echo $row['image']; ?>"  alt="Home"  />
													</div>
													<div class="col-xs-12 col-sm-6">
															<h3><?php echo $row['first_name']. " ". $row['last_name']; ?></h3>
															<p>
                                <label for="Username">Username:</label>
																<?php

																	echo $row['username'];
																	?>
                              </p>
                              <p>
                                  <label for="Address">Address:</label>
  																<?php
  																	echo $row['unit_address']. " ". $row['number_street']. " ". $row['name_street']. " ".$row['suburb']. " ". $row['state']. " ". $row['postcode']. " ". $row['country']  ;
  																	?>
															</p>
                              <p>
                                <label for="Email">Email:</label>
																<?php
																	echo $row['email'];
																	?>
                              </p>
                              <p>
                                <label for="Phone">Phone:</label>
																<?php
																	echo $row['number_phone'];
																	?>
                              </p>
															<p>
                                <label for="Phone">Mobile:</label>
																<?php
																	echo $row['number_mobile'];
																	?>
                              </p>
                              <p>
                                <label for="Gender">Gender:</label>
																<?php
																	echo $row['gender'];
																	?>
                              </p>
                              
                              <p>
                                <label for="type_account">Type account:</label>
																<?php
																	echo $row['role'];
																	?>
                              </p>
															<div id="btn_action">
																		<form name="memberedit_form" id="memberedit_form" method="post" action="member_edit.php" >
																			<input type="hidden" name="memberID" id="memberID" value="<?php echo $row['membershipID']; ?>">
																			<button type="submit" class="btn btn-warning">Edit</button>
																		</form>
															</div>

													</div>
										</div>

									<!-- </div> -->
											</div>
									<!-- </div> -->

								<!-- </div> -->

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
