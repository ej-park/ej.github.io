<?php

$dbhost = "localhost";
$dbuser = "develql0_root";
$dbpass = "sNGfbwpPXnw3";
$db = "develql0_crudcamp";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if(mysqli_connect_errno()) {
 die("Database connection failed: " .
  mysqli_connect_error() .
  "(" .mysqli_connect_errno() . ")"
 );
}
   
?>