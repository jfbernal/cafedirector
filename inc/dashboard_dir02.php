<?php
include ('../lib/conn.php');
$sql2 = "SELECT * FROM  order_supplies JOIN supplies ON supplies.supplyID= order_supplies.supplyID Where supplies.supplyID = '11'";
$result2 = mysqli_query($conn, $sql2);
        ?>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
				// include ('../inc/header.php');
				?>
                          <div id="columnchart_material" class="chart_dir2"></div>

				<?php
					// include ('../inc/footer.php');
?>
