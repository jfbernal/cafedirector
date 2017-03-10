<?php
include ('../lib/conn.php');
$sql1 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID ";
$result1 = mysqli_query($conn, $sql1);
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
            var options = {'title':'Supplies'};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
            chart.draw(data, options);
          }
        </script>

        <?php
				// include ('../inc/header.php');
				?>
                      <!--Div that will hold the pie chart-->

                          <div id="chart_div1" class="chart_dir1"></div>


				<?php
					// include ('../inc/footer.php');
?>
