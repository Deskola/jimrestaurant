<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "jimrestaurant_db";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	# if connection to database fails this messge will be displayed
	die("Connection failed".mysqli_error($conn));
}