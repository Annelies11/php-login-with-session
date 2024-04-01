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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="admin">
        <h2>Login Success</h2>
        <?php echo $row['user_email'];?>
        <br>
        <a href="logout.php">Logout</a>
        <span>
                        <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                        }
                        unset($_SESSION['message']);
                        ?>
                    </span>
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
                  <td>Action</td>
                  
                </tr>
                <tr>
                  <?php
                  // $query = "SELECT * FROM sample";
                  // $res = mysqli_query($conn, $query);
                  require_once "functions.php";
                  $res = displayData();
                  while($row = mysqli_fetch_assoc($res))
                  {?>

                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><a href="update.php?updateId=<?php echo $row['id'];?>" class="btn btn-primary" style="margin-right:10px;"><span class="material-symbols-outlined">edit</span></a>
                  <!-- <a href="delete.php?deleteId=<?php echo $row['id'];?>" class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a></td> -->
                  <a onclick="deleteData(<?php echo $row['id']; ?>)" class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a></td>
                  </tr>

                  <?php
                  }
                  ?>
                <script>
                  function deleteData(id) {
                    if(window.confirm("hapus?")) {
                      window.location.href = 'delete.php?deleteId='+id;
                    }
                  }
                  </script>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>