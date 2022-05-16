<?php
$host = "localhost";
$user = "postgres";
$pass = "admin";
$db = "thb";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("could not connect to server");

// Check connection
if(!$con){
  echo "Error : unable to  connect database";
}
?>
    