<?php
session_start();

if (isset($_POST['store_info'])){

  include ('header.php');

  $storeID = mysqli_real_escape_string($conn, $_POST['storeID']);
  $sql = "SELECT * FROM stores WHERE storeID='$storeID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $_SESSION['application_storeID']=$storeID;
  ?>
  <div class="row">

  	<div class="col-xs-12">
  			<fieldset>
  						<legend>Store: <?php echo $row['namestore']; ?> </legend>

  										<div class="row">
  													<div class="col-xs-12 col-sm-6">
  															<img class="img-responsive" src="<?php echo $row['img_path']; ?>"  alt="Home"  />
  														</p>
  													</div>
  													<div class="col-xs-12 col-sm-6">
  															<h3><?php echo $row['namestore']; ?></h3>
                                <p>
                                <?php
                                  $store_description = substr($row['store_description'], 0, 1000);
                                  echo  $store_description;

                                  if ($role === 'registered' || $role === ''){
                                    ?>

                                    <form name="store_apply" id="store_apply" method="post" action="application.php" >
                                      <input type="hidden" name="namestore" value="<?php echo $row['namestore']; ?>" >
                                      <input type="hidden" name="storeID" value="<?php echo $storeID; ?>" >
                                      <button type="submit" class="btn btn-warning" name="submit_apply" >Apply</button>
                                    </form>
                                    <?php
                                  }
                                  else {
                                    echo "********** select user: **********";
                                  }
    														if ($level8 === 1){
    														?>
                                <form name="store_update" id="store_update" method="post" action="store_edit.php" >
                                  <input type="hidden" name="storeID" value="<?php echo $storeID; ?>" >
  																<button type="submit" class="btn btn-warning" name="submit_store_edit" >Edit</button>
  															</form>
                                <?php
    															}
    														?>
  															<p>

  															</p>
  													</div>
  										</div>


  			</fieldset>
  		</div>

  </div>
  <script>
  		$("#comment_form").validate({
  		});
  </script>
  <?php
  include ('footer.php');
}
?>
