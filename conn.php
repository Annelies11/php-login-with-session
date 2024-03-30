<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "auth_train";
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(mysqli_connect_error()){
    echo "Failed to connect : ".mysqli_connect_error();
}
?>