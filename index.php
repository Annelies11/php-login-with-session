<?php
    session_start();
    include('conn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login With Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url("img/bg-blur.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            padding: 10px;
        }
        .container{
            margin-top: 30px;
        }

        .form-heading { 
            color:#110550; 
            font-size:23px;
            text-align:center;
        }
        .panel h2{
            color:#444444; 
            font-size:18px; 
            margin:0 0 8px 0;
        }
        .panel p { 
            color:#777777; 
            font-size:14px; 
            margin-bottom:30px; 
            line-height:24px;
        }
        .login-form .form-control {
            background: #f7f7f7 none repeat scroll 0 0;
            border: 1px solid #d4d4d4;
            border-radius: 4px;
            font-size: 14px;
            height: 50px;
            line-height: 50px;
        }
        .main-div {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 2px;
            margin: 10px auto 30px;
            max-width: 38%;
            padding: 50px 70px 70px 71px;
        }
        
        .login-form .form-group {
            margin-bottom:10px;
        }
        .login-form{ 
            text-align:center;
        }
        .forgot a {
            color: #777777;
            font-size: 14px;
            text-decoration: underline;
        }
        .login-form  .btn.btn-primary {
            background: #280291 none repeat scroll 0 0;
            border-color: #280291;
            color: #ffffff;
            font-size: 14px;
            width: 100%;
            height: 50px;
            line-height: 50px;
            padding: 0;
        }
        .forgot {
            text-align: left; margin-bottom:30px;
        }   
        .botto-text {
            color: #ffffff;
            font-size: 14px;
            margin: auto;
        }
        .login-form .btn.btn-primary.reset {
            background: #ff9900 none repeat scroll 0 0;
        }
        .back { 
            text-align: left; 
            margin-top:10px;
        }
        .back a {
            color: #444444; 
            font-size: 13px;
            text-decoration: none;
        }
    </style>
</head>
  <body id="LoginForm">
    <div class="container text-center">
        <h1 class="form-heading">PHP Login Using Cookies and Session</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Admin Login</h2>
                    <p>Please enter your username and password</p>
                </div>
                <form action="login.php" method="POST" id="Login">
                    <div class="form-group">
                        <input type="text" value="<?php if(isset($_COOKIE["user"])){echo $_COOKIE["user"];} ?>" name="username" class="form-control" id="inputEmail" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];} ?>" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>  
                    <div class="form-group" style="text-align: left;">
                    <label><input type="checkbox" name="remember" >Remember Me</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot Password</a>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="login">
                    <span>
                        <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
                        unset($_SESSION['message']);
                        ?>
                    </span>
                </form>
                <br>
                <footer class="blockquote-footer">Made by <cite title="Source Title"><a href="https://www.arismahmudi.my.id/">Aris Mahmudi</a></cite></footer>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>