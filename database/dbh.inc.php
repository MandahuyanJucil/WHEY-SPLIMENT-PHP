<?php 

$servername ="localhost";
$dBUsername ="root";
$dBPassword ="";
$dBName ="WheySupliment";

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if(!$conn){
die("Conection failed: " . mysqli_connect_error());
}


