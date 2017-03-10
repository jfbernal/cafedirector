<?php
include ('../lib/login_check.php');
ob_start();
if(!isset($_SESSION)) {
     session_start();
}
include ('../lib/conn.php');
?>
<?php

  if (isset($_POST['application_update_process'])){
    $application_status = mysqli_real_escape_string($conn, $_POST['application_status']);
    $applicationID = mysqli_real_escape_string($conn, $_POST['applicationID']);
    // $application_status = $_POST['application_status'];

    $sql = "UPDATE applications SET application_status = '$application_status'
    WHERE applicationID = $applicationID";
    $result = mysqli_query($conn, $sql);

    if ($application_status == 'approved'){

      $sql = "SELECT * FROM applications WHERE applicationID='$applicationID'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $storeID = $row['storeID'];
      $userID = $row['userID'];
      $sql = "UPDATE users SET storeID = '$storeID', role = 'manager'
      WHERE userID = $userID";
      $result = mysqli_query($conn, $sql);

      $sql = "UPDATE stores SET franchise_available = 'no', store_status = 'open'
      WHERE storeID = $storeID";

      $result = mysqli_query($conn, $sql);

    }
   header("location:message.php?successful=update");
  }
  else {
    if (isset($_POST['application_info'])){
      include ('header.php');
      $applicationID = mysqli_real_escape_string($conn, $_POST['applicationID']);
      $sql = "SELECT * FROM applications WHERE applicationID='$applicationID' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);

      ?>
      <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <fieldset>
              <form name="apply_form" id="apply_form" method="post" action="application_info.php" >
                  <legend>Application: <?php echo $row['application_status']; ?> </legend>
                      <div class="form-group">
                        <div class="col-xs-12">
                          <div class="row">
                            <label for="expectation">Why do your want your own café:</label>
                            <textarea class="form-control" rows="5" id="expectation" maxlength="1000" name="expectation" disabled><?php echo $row['expectation']; ?></textarea>
                            <label for="start_date">When are you looking:</label>
                            <input  class="form-control" type="date" id="start_date" name="start_date" placeholder="" value="<?php echo $row['start_date']; ?>" disabled>

                            Application: <?php echo $row['application_status']; ?></br>
                            <label for="status"><span id="required">* </span>Status:</label>
                            <label class="radio-inline"><input type="radio" <?php if ($row['application_status']=='pending') {echo "checked='checked'";} ?> name="application_status" value="pending"  >Pending</label>
                            <label class="radio-inline"><input type="radio" <?php if ($row['application_status']=='proccesing') {echo "checked='checked'";} ?> name="application_status" value="proccesing" >Proccesing</label>
                            <label class="radio-inline"><input type="radio" <?php if ($row['application_status']=='approved') {echo "checked='checked'";} ?> name="application_status" value="approved" >Approved </label>
                            <label class="radio-inline"><input type="radio" <?php if ($row['application_status']=='cancelled') {echo "checked='checked'";} ?> name="application_status" value="cancelled" >Cancelled</label>
                            <label class="radio-inline"><input type="radio" <?php if ($row['application_status']=='rejected') {echo "checked='checked'";} ?> name="application_status" value="rejected" >Rejected</label>
                          </div>
                          <div class="row">
                                <div class="col-xs-6">
                                  </p>
                                </div>
                                <div class="col-xs-6">



                                      <input type="hidden" name="applicationID" value="<?php echo $applicationID; ?>" >

                                      <button type="submit" class="btn btn-warning" name="application_update_process" >Update</button>
                                    </form>
                                    <p>

                                    </p>
                                </div>
                          </div>

                        </div>
                    </div>
            </fieldset>
          </div>
          <div class="col-xs-2"></div>
      </div>
      <script>
          $("#comment_form").validate({
          });
      </script>
      <?php
      include ('footer.php');

    }
  }

?>
