<?php
define("DB_NAME","proyecto");//proyecto codigo facilito
define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
// Create connection
$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD,DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// mysqli_close($conn);
/* // Create database
$sql = "CREATE DATABASE newdbproyect";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
} */
?>