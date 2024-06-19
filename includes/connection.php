<?php
$server = 'localhost';
$un = 'root';
$pass = '';
$db = 'mystoreb4';

$con=mysqli_connect($server, $un, $pass, $db);

if(!$con){
  die(mysqli_error($con));
}
?>






