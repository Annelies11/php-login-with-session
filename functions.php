<?php

require_once "conn.php";

function displayData(){
    global $conn;
    $query = "SELECT * FROM sample";
    $res = mysqli_query($conn, $query);
    return $res;
}
