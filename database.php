<?php
// session_start();
// $hostname     = "localhost"; // Enter Your Host Name
// $username     = "root";      // Enter Your Table username
// $password     = "password";          // Enter Your Table Password
// $databasename = "webapp"; // Enter Your database Name

// $errors = array();
// $conn = new mysqli($hostname, $username, $password, $databasename);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
$conn = mysqli_connect("localhost","root","password","webapp");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

