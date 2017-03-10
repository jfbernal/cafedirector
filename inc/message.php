<?php

	include ('header.php');
?>
<div class="row">
	<!-- <div class="col-sm-3"></div> -->
	<div class="col-xs-12">
			<fieldset>
						<legend>Information page</legend>
						<!-- <div class="col-sm-3"></div> -->
						<!-- <div class="col-sm-6"> -->
						<div class="col-xs-6 col-xs-offset-3">
							<h4>
                <?php
                  if (isset($_GET['successful'])){
                    if ($_GET['successful'] == 'categories'){
                      echo "Thank you for created category. ";
                    }
										if ($_GET['successful'] == 'application'){
                      echo "Thank your application ";
                    }
										if ($_GET['successful'] == 'movies'){
                      echo "Thank you for created movie. ";
                    }
										if ($_GET['successful'] == 'add_reviews'){
                      echo "Thank you for add new review. ";
                    }
										if ($_GET['successful'] == 'add_comment'){
                      echo "Thank you for add new comment. </p>";
											echo "<a href='list_movies.php'><input class='btn btn-warning' type='submit' name'back' value='Back'></a>";
                    }

										if ($_GET['successful'] == 'resgiter'){
                      echo "Thank you for your registation. ";
                    }
										if ($_GET['successful'] == 'update'){
                      echo "Thank you for update your profile. ";
											echo "</p>";
											echo "<a href='members_list.php'><input class='btn btn-warning' type='submit' name'back' value='Back'></a>";

                    }
                    // echo  "<font color='red'>". $_GET['user'] . "</font>" . " this username is already taken please choose another one" ;
                  }
									if (isset($_GET['warning'])){
                    if ($_GET['warning'] == 'empty_categoties'){
                      echo "You need create a less one category. ";
                    }
										if ($_GET['warning'] == 'one_categoties'){
                      echo "You NO need create a less one category. ";
                    }
										if ($_GET['warning'] == 'one_categoties'){
                      echo "You NO need create a less one category. ";
                    }
										if ($_GET['warning'] == 'application_store'){
                      echo "Please, select a store from list. ";
                    }
										if ($_GET['warning'] == 'error_login'){
                      echo "Please try again, your login or password is incorrect. ";
											echo "</p>";
											echo "<a href='login.php'><input class='btn btn-warning' type='submit' name'back' value='Back'></a>";
                    }


                    // echo  "<font color='red'>". $_GET['user'] . "</font>" . " this username is already taken please choose another one" ;
                  }
									if (isset($_GET['alert'])){
                    if ($_GET['alert'] == 'categories'){
                      echo "Thank you for create category. ";
                    }
                  }
									if (isset($_GET['error'])){
                    if ($_GET['error'] == 'form'){
                      echo "Error process form. ";
                    }
                  }
                ?>
              </h4>
						</div>
						<!-- <div class="col-sm-3"></div> -->
			</fieldset>
		</div>
		<!-- <div class="col-sm-3"></div> -->
</div>


<?php
include ('footer.php');
?>
