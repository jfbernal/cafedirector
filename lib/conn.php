<?php
// $conn = mysqli_connect("192.168.1.10", "ucafedirector", "CaFE9284", "cafedirector_v0021");
$conn = mysqli_connect("localhost", "conetsol_cafed22", "2rfcEoHXkA", "conetsol_cafed22");
if (mysqli_connect_errno($conn)){
	echo "Unable to connect to the database: " .mysqli_connect_error();
}
?>