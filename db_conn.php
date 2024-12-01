<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "diner";

$conn = mysqli_connect($severname, $username, $password, $dbname);

if (!$conn){
    die("Connection failed" . mysqli_connect_error());
}
//echo "success";
?>