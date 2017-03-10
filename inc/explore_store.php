<?php
include ('../inc/header.php');
?>
<?php
$sql = "SELECT * FROM stores WHERE franchise_available='yes' ORDER BY update_datestamp";
$result = mysqli_query($conn, $sql);
?>
<legend>TOP STORE AVAILABLE </legend>
                    <?php
                        foreach ($result as $row) {
                    ?>
                              <div class="col-xs-12 col-sm-6 col-lg-4">
																	<div class="box_medium_square">
                                    <h4><?php echo $row['namestore']; ?></h4>
                                    <img  src="<?php echo $row['img_path']; ?>"  style="width:250px;height:200px;" alt="Home"  />

                                    <b><?php echo $row['unit']." ".$row['streetnumber']." ".$row['streetname']." ".$row['suburb']." ".$row['state']." ".$row['postcode']; ?>
																		</b>

																						 <div id="btn_action">
			 																						<form name="store_info" id="store_info" method="post" action="store_info.php" >
			 																							<input type="hidden" name="storeID" id="storeID" value="<?php echo $row['storeID']; ?>">
			 																							<button type="submit" class="btn btn-warning btn-xs" id="store_info" name="store_info">More info</button>
			 																						</form>
			 																			</div>
                              </div>
                            </div>
                      <?php
                        }
                      ?>
	<?php
	include ('../inc/footer.php');
	?>
