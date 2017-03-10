<?php
session_start();
  include ('../inc/header.php');
  $userID = $_SESSION['logged_userID'];
  $sql = "SELECT * FROM stores JOIN users ON stores.storeID = users.storeID WHERE users.userID='$userID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  ?>
  <div class="row">
  	<!-- <div class="col-xs-2"></div> -->
  	<div class="col-xs-12">
  			<fieldset>
  						<legend>My Store: <?php echo $row['namestore']; ?> </legend>
  								<div class="form-group">
  									<div class="col-xs-12">
  										<div class="row">
  													<div class="col-xs-6">
  															<?php echo $row['namestore']; ?>
  														</p>
  													</div>
  													<div class="col-xs-6">
                              Address: <?php echo $row['unit']. " ".$row['streetnumber']. " ".$row['streetname']. " ".$row['suburb']. " ".$row['state']. " ".$row['postcode']; ?>
                              Website: <?php echo $row['website']; ?>
                              Email: <?php echo $row['email']; ?>
  													</div>
  										</div>
  											<div class="row">
  													<div class="col-xs-8">

  														</div>
  														<div class="col-xs-4">
  														</div>
  											</div>
  									</div>
  							</div>
  			</fieldset>
  		</div>
  		<!-- <div class="col-xs-2"></div> -->
  </div>
  <script>
  		$("#comment_form").validate({
  		});
  </script>
  <?php
  include ('footer.php');

?>
