<?php
ob_start();
session_start();
include ('../lib/conn.php');
$sql1 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID ";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID Where supplies.supplyID = '11'";
$result2 = mysqli_query($conn, $sql2);

if (isset($_SESSION['logged_userID'])){

        // $sql1 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID ";

        ?>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});
          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);
          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
              <?php
              foreach ($result1 as $row) {
                $q = $row['quantity'];
                $q = $q/100;
              ?>
              ['<?php echo $row['supply_name']?>', <?php echo $q;?>],
              <?php
              }
              ?>
              // ['Mushrooms', 3],
              // ['Onions', 1],
              // ['Olives', 1],
              // ['Zucchini', 1],
              // ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {'title':'Supplies','width':400,'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
          }
        </script>
        <script type="text/javascript">
          google.load("visualization", "1.1", {packages:["bar"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([

              ['Year', 'Cups'],
              <?php
              foreach ($result2 as $row) {
              ?>
              ['<?php echo $row['date_order']?>', <?php echo $row['quantity']?>],
              <?php
              }
              ?>
            ]);

            var options = {
              chart: {
                title: 'Cups supplies',
                subtitle: 'Last year',
              }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, options);
          }
        </script>

        <?php
				include ('../inc/header.php');
				?>
        sdf
				<div class="row">

							<fieldset>
										<legend>Dashboard</legend>
										<div class="col-xs-12 col-sm-6 col-lg-4">

                      <!--Div that will hold the pie chart-->

                      <div class="col-xs-6 ">
                          <div id="chart_div1"></div>
                      </div>
                      <div class="col-xs-6 ">
                          <div id="columnchart_material" style="width: 300px; height: 300px;"></div>
                      </div>




										</div>
							</fieldset>

					</div>

				<?php
					include ('../inc/footer.php');


}
else {
	header("location:register_account.php");
}
?>
