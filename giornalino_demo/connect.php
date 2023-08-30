<?php

if (!isset($_SESSION)) 
{
    session_start();
}

if (!isset($_SESSION['user'])) {
  die("Error: Session variables not set.");
}

$host = "localhost";
$user = "id21090150_root";
$pass = "Admin.12345";
$db = "id21090150_giornalino";
$c = new mysqli($host,$user,$pass,$db);

if($c -> connect_error) {
  die("Error: ".mysqli_connect_error());
}
?>