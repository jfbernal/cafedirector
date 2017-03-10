<?php
include ('../lib/login_check.php');
include ('../lib/conn.php');
include ('../inc/header.php');
if(!isset($_SESSION)) {
     session_start();
}
if ($_SESSION['logged_role'] == "manager" ){
  if ($_SESSION['logged_storeID'] != "" || $_SESSION['logged_storeID'] != 0){
    $storeID = $_SESSION['logged_storeID'];
    $sql = "SELECT * FROM membership JOIN users ON membership.membershipID = users.membershipID WHERE storeID = '$storeID'";
  }
}
else {
  $sql = "SELECT * FROM membership JOIN users ON membership.membershipID = users.membershipID";
}

$result = mysqli_query($conn, $sql);
?>
    <div class="row">
    	<!-- <div class="col-xs-2"></div> -->
    	<div class="col-xs-12">
    			<fieldset>
    						<legend>Members list</legend>
    								<div class="form-group">
    									<div class="col-xs-1">
    										<!-- sidebar left -->
    									</div>
    									<div class="col-xs-10">
                        <?php
                            foreach ($result as $row) {
                        ?>
                                  <div class="col-xs-12">
                                    <div class="members_list">
                                    <div class="col-xs-4  col-centered">
                                        <img class="img-responsive" src="<?php echo $row['image']; ?>"  alt="Home"  height="72" width="72"/>
                                    </div>
                                    <div class="col-xs-8">
    																		<div class="row">
                                          <h5><?php echo $row['username']; ?></h5></p>
                                          <?php echo $row['country']; ?></p>
                                        	<?php echo $row['join_datestamp']; ?>
    																		</div>
                                        <div id="btn_action">
        																				<form name="memberedit_form" id="memberedit_form" method="post" action="member_edit.php" >
        																					<input type="hidden" name="memberID" id="memberID" value="<?php echo $row['membershipID']; ?>">
        																					<button type="submit" class="btn btn-warning btn-xs" name="member_edit">Edit</button>
        																				</form>
        																</div>
                                        <div id="btn_action">
        																				<form name="memberdelete_form" id="memberdelete_form" method="post" action="member_delete.php" >
        																					<input type="hidden" name="memberID" id="memberID" value="<?php echo $row['membershipID']; ?>">
        																					<button type="submit" class="btn btn-warning btn-xs" name="member_delete">Delete</button>
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
    		<!-- <div class="col-xs-2"></div> -->
    	</div>
<?php
include ('footer.php');
?>
