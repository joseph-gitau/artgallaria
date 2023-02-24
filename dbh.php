<?php
// database connection file
$server = "Localhost";
$username = "root";
$password = "";
$dbname = "art_project";

// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
