<?php
include ('../lib/login_check.php');
include ('../inc/header.php');
if(!isset($_SESSION)) {
     session_start();
}
$sql = "SELECT applicationID, stores.img_path AS store_image, stores.namestore AS namestore, stores.suburb AS store_suburb, stores.postcode AS store_postcode,
membership.image AS user_image, membership.first_name AS first_name, membership.last_name AS last_name, membership.number_mobile AS user_number_mobile, membership.email AS user_email
FROM applications JOIN stores ON applications.storeID = stores.storeID
JOIN users ON applications.userID = users.userID JOIN membership ON membership.membershipID = users.membershipID WHERE application_status!= 'approved'";

$result = mysqli_query($conn, $sql);
?>
    <div class="row">
    	<div class="col-xs-2"></div>
    	<div class="col-xs-8">
    			<fieldset>
    						<legend>applications list</legend>
    								<div class="form-group">
    									<div class="col-xs-1">
    										<!-- sidebar left -->
    									</div>
    									<div class="col-xs-10">
                        <?php
                            foreach ($result as $row) {
                        ?>
                                  <div class="col-xs-12">

                                      <div class="row">
                                        <div class="applications_list">
                                        <div class="col-xs-2  col-centered">
                                          <img class="img-responsive" src="<?php echo $row['store_image']; ?>"  alt="Home"  height="72" width="72"/>
                                        </div>
                                        <div class="col-xs-4">
                                          <h5><?php echo $row['namestore']; ?></h5></p>
                                          <?php echo $row['store_suburb']; ?></p>
                                        	<?php echo $row['store_postcode']; ?>
    																		</div>
                                        <div class="col-xs-4">
                                          <h5><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h5></p>
                                          <?php echo $row['user_number_mobile']; ?></p>
                                        	<?php echo $row['user_email']; ?>
    																		</div>
                                        <div class="col-xs-2  col-centered">
                                          <img class="img-responsive" src="<?php echo $row['user_image']; ?>"  alt="Home"  height="72" width="72"/>
                                        </div>
                                        <div id="btn_action">
        																				<form name="application_info" id="application_info" method="post" action="application_info.php" >
        																					<input type="hidden" name="applicationID" id="applicationID" value="<?php echo $row['applicationID']; ?>">

        																					<button type="submit" class="btn btn-warning btn-xs" name="application_info">More info</button>
        																				</form>
        																</div>
                                    </div>
                                  </div>
                                </div>
                          <?php
                            }
                          ?>
    									</div>
    									<div class="col-xs-1">
    											<!-- sidebar rigth -->
    									</div>
    								</div>
    			</fieldset>
    		</div>
    		<div class="col-xs-2"></div>
    	</div>
<?php
include ('footer.php');
?>
