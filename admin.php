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
        <br>
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
                  
                  <td><a href="#" class="btn btn-primary" style="margin-right:10px;" data-toggle="modal" data-target="#editModal<?php echo $row['id'];?>"><span class="material-symbols-outlined">edit</span></a>  
                  <a onclick="deleteData(<?php echo $row['id']; ?>)" class="btn btn-danger"><span class="material-symbols-outlined">delete</span></a></td>
                  <!--modalEdit start-->
                  <form action="" method="POST">
                  <div class="modal fade" id="editModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div  class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Update Data ID : <?php echo $row['id'];?></h5>
                        </div>
                        <div class="modal-body">
                        <h4 class="form-heading">Name :</h4>
                        <input type="Text" value="<?php echo $row['name']; ?>" name="name" class="form-control" id="" >
                        <h4 class="form-heading">Address :</h4>
                        <input type="Text" value="<?php echo $row['address']; ?>" name="address" class="form-control" id="">
                        <h4 class="form-heading">Email :</h4>
                        <input type="Text" value="<?php echo $row['email']; ?>" name="email" class="form-control" id="">
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id" class="form-control" id="">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                  <?php
                    if(isset($_POST['update'])){
                      $id = $_POST['id'];
                      $name = $_POST['name'];
                      $address = $_POST['address'];
                      $email = $_POST['email'];

                      $sql = "UPDATE sample SET name='$name', address='$address', email='$email' WHERE id=$id";
                      $res = mysqli_query($conn, $sql);
                      if(!$res){
                        trigger_error("Error bro :".mysqli_error($res));
                      } else {
                        $_SESSION['message']="Update success!";
                        echo "<meta http-equiv='refresh' content=0.1; url=?page=admin>";
                      }
                    }
                  ?>
                  <!--modalEdit end-->
                </tr>
                  

                  <?php
                  }
                  ?>
                  
                
              </table>
              
              
            </div>
          </div>
        </div>
      </div>
      <br>
                <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
        Launch demo modal
      </button> -->
    </div>
    <br>


<!-- Modal -->

    <script>
      function updateData(id){
        document.getElementById("demo").innerHTML = "I have changed!";  
      }
      function deleteData(id) {
        if(window.confirm("hapus?")) {
          window.location.href = 'delete.php?deleteId='+id;
        }
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>