<?php

if(!isset($_SESSION))
{
  session_start();
}

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
  die("Error: Session variables not set.");
}

$host = "localhost";
$user = $_SESSION['user'];
$pass = $_SESSION['password'];
$db = "giornalino";
$c = new mysqli($host,$user,$pass,$db);

if($c -> connect_error) {
  die("Error: ".mysqli_connect_error());
}
?>