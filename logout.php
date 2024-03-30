<?php
session_start();
session_destroy();

if(isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
    setcookie("user", '', time() - (3600));
    setcookie("pass", '', time() - (3600));
}
header('Location:index.php');