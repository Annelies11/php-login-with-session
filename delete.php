<?php
session_start();
include_once "conn.php";

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];

    $sql = "DELETE FROM sample WHERE id = $id";

    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['message']="Delete success!";
        echo "Cok";
        header('Location:admin.php');
    } else {
        die((mysqli_error($conn)));
    }
}