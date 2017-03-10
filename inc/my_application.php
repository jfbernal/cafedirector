<?php
session_start();
  include ('header.php');
  $userID = $_SESSION['logged_userID'];
  $sql = "SELECT * FROM applications JOIN stores ON applications.storeID = stores.storeID WHERE userID='$userID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  ?>
  <div class="row">
  	<!-- <div class="col-xs-2"></div> -->
  	<div class="col-xs-12">
  			<fieldset>

  						<legend>Applications:</legend>
              <?php
                  foreach ($result as $row) {
              ?>
  								<div class="form-group">
  									<!-- <div class="col-xs-12"> -->
  										<div class="row">
  													<div class="col-xs-6">
  															<b>Name Store: </b><?php echo $row['namestore']; ?>

  														</p>
  													</div>
  													<div class="col-xs-6">
                              <b>Status: </b> <?php echo $row['application_status']; ?>
  													</div>
  										</div>


  											<!-- </div> -->
  									</div>

                <hr>
                <?php
              }
                ?>
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
