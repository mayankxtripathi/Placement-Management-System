<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PP-2";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}
