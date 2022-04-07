<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_data";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn){
    // echo "Connected";
}
else{
    // echo "Disconnected";
    die("Connection Fialed because ".mysqli_connect_error());
}
?>