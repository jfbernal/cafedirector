<?php
include ('../inc/header.php');
?>
<?php
$sql = "SELECT * FROM stores WHERE franchise_available='yes' ORDER BY update_datestamp DESC LIMIT 6";
$result = mysqli_query($conn, $sql);
?>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
			<fieldset>
								<div class="form-group">

									<div class="col-xs-12">
                    <!-- <div class="Row1"> -->
                    <?php
                        foreach ($result as $row) {
                    ?>
                              <div class="col-xs-4">
                                <div class="store_home">
                                <div class="col-xs-12  col-centered">
																		<h4><?php echo $row['namestore']; ?></h4>
                                    <img class="img-responsive" src="<?php echo $row['img_path']; ?>"  alt="Home"  />
                                </div>
                                <div class="col-xs-12">
																		<div class="row">
                                    	<?php

																				$store_description = substr($row['store_description'],0, 150);
																				echo  $store_description
																				?>
																		</div>
                                    <div class="row">
                                    	<b><?php echo $row['unit']." ".$row['streetnumber']." ".$row['streetname']." ".$row['suburb']." ".$row['state']." ".$row['postcode']; ?></b>
																		</div>

																		<div class="row">
																						 <div id="btn_action">
			 																						<form name="store_info" id="store_info" method="post" action="store_info.php" >
			 																							<input type="hidden" name="storeID" id="storeID" value="<?php echo $row['storeID']; ?>">
			 																							<button type="submit" class="btn btn-warning btn-xs" id="store_info" name="store_info">More info</button>
			 																						</form>
			 																			</div>
																		 </div>
                                </div>


                                <!-- </div> -->
                              </div>
                            </div>

                            <!-- </div> -->

                      <?php
                        }
                      ?>
                      <!-- </div> -->
									</div>

								</div>
			</fieldset>
		</div>
		<div class="col-xs-2"></div>
	</div>

	<?php
	include ('inc/footer.php');
	?>
