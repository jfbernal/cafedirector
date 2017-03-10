<?php
include ('../lib/login_check.php');
?>
<?php
if(!isset($_SESSION)) {
     session_start();
}
include ('../lib/header.php');
?>
<?php
    $sql = "SELECT * FROM stores ";
    $result = mysqli_query($conn, $sql);
?>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
			<fieldset>
						<legend>Stores list</legend>

								<div class="form-group">
									<div class="col-xs-1">
										<!-- sidebar left -->
									</div>
									<div class="col-xs-10">
                    <!-- <div class="Row1"> -->
                    <?php
                        foreach ($result as $row) {
                    ?>
                              <div class="col-xs-6">
                                <div class="store_list">
                                <div class="col-xs-6  col-centered">
                                    <img class="img-responsive" src="<?php echo $row['img_path']; ?>"  alt="Home"  />

																<!-- <br> -->
																</p>
																	<div id="btn_action">
																				<form name="store_info" id="store_info" method="post" action="store_info.php" >
																					<input type="hidden" name="storeID" id="storeID" value="<?php echo $row['storeID']; ?>">
																					<button type="submit" class="btn btn-warning btn-xs" name="store_info" id="store_info" >More info</button>
																				</form>
																	</div>

                                </div>
                                <div class="col-xs-6">
                                    <h4><?php echo $row['namestore']; ?></h4>
																		<div class="row">
                                    	<?php
																				$store_description = substr($row['store_description'], 0, 100);
																				echo  $store_description
																				?>
																		</div>
																		<div class="row">
																		 	Phone: <?php echo $row['unit']." ". $row['streetnumber']." ". $row['streetname']." ". $row['suburb']." ".  $row['state']  ; ?>
																		</div>
																		<div class="row">
																		 	Phone: <?php echo $row['phone1']; ?>
																		</div>
																		<div class="row">
																			 Phone: <?php echo $row['phone2']; ?>
																		</div>

																			<div class="row">
                                    	Total comments:
																						<?php
																								//$movieID = $row['movieID'];
				                                        $sql = "SELECT * FROM comments WHERE movieID='$movieID' ";
																								if ($result=mysqli_query($conn,$sql)){
																									$rowcount=mysqli_num_rows($result);
																									echo $rowcount;
																									mysqli_free_result($result);
																								}
				                                     ?>
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
