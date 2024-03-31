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
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .container{
        margin-top: 30px;
      }
      .container h2{
        margin-bottom: 20px;
      }
      .container .admin {
        color: white;
      }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="admin">
        <h2>Login Success</h2>
        <?php echo $row['user_email'];?>
        <br>
        <a href="logout.php">Logout</a>
      </div>
      <div class="row mt-2">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center" style="font-family: century gothic;">Member of Conggress</h2>
            </div>
            <div class="card-body">
              <table class="table table-bordered text-center">
                <tr class="table-dark text-white">
                  <td>User ID</td>
                  <td>Name</td>
                  <td>Address</td>
                  <td>Email</td>
                </tr>
                <tr>
                  <?php
                  $query = "SELECT * FROM sample";
                  $res = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_assoc($res))
                  {?>

                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  </tr>

                  <?php
                  }
                  ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>