<?php
if(isset($_POST['login'])){
    session_start();
    include('conn.php');
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $query = mysqli_query($conn, "SELECT * FROM user_cookies WHERE user_name='$user' AND user_password='$pass'");
    if(mysqli_num_rows($query)==0){
        $_SESSION['message']="Login Failed. User not Found!";
        header('Location:index.php');
    } else {
        $row = mysqli_fetch_array($query);
        if(isset($_POST['remember'])){
            setcookie("user", $row['user_name'], time()+(86400 * 30));
            setcookie("pass", $row['user_password'], time()+(86400 * 30));
        }

        $_SESSION['id']=$row['user_id'];
        header('Location:admin.php');
    }
} else {
    header('Location:index.php');
    $_SESSION['message']="Please Login!";
}