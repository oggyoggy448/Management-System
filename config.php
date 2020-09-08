<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "management_system";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) { 
  header('location: con_err.php');
  die();
}


?>