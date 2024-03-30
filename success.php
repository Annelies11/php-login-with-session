<?php
    session_start();
    if(!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')){
        header('Location:index.php');
        exit();
    }
    include('conn.php');
    $query=mysqli_query($conn, "SELECT * FROM user_cookies WHERE user_id='".$_SESSION['id']."'");
    $row=mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login With Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
  </body>
</html>