<?php
include ('login_check.php');
include ('inc/conn.php');
ob_start(); // Turn on output buffering
session_start();
?>
<?php

include ('inc/conn.php');

$delete_movie = mysqli_real_escape_string($conn, $_POST['movieID']);

$sql_movies = "DELETE FROM movies WHERE  movieID = '$delete_movie' ";
$result = mysqli_query($conn, $sql_movies);

$sql_reviews = "DELETE FROM reviews WHERE  movieID = '$delete_movie' ";
$result = mysqli_query($conn, $sql_reviews);


header("location:list_movies.php");

?>
