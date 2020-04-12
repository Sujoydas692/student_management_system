<?php

 include 'connection.php';
 session_start();

  if (isset($_SESSION['user_login'])) {

  header('location: index.php');
  
 }

 if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $username_check = mysqli_query($con, "SELECT * FROM `user_info` WHERE `username` = '$username'");

  if (mysqli_num_rows($username_check) > 0) {

    $row = mysqli_fetch_assoc($username_check);

    if ($row['password'] == md5($password)) {

      if ($row['status'] == 'active') {

        $_SESSION['user_login'] = $username;

        header('location: index.php');
        
      }else {
        $status_inactive = "Your Status Inactive!";
      }
      
    }else {
      $wrong_password = "Wrong Password!";
    }
    
  }else {
    
    $username_not_found = "Username Not Found!";
  }
   
 }

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
      <br>
      <h1 class="text-center">Admin Login</h1>
      <hr>
      <br>

      <div class="row">
    <div class="col-sm-4 offset-4">
      <form action="login.php" method="POST">
        <div>
          <input type="text" name="username" placeholder="Username" required="" class="form-control" value="<?php if(isset($username)){echo $username;} ?>"><br>
        </div>
        <?php if (isset($username_not_found)) {echo '<div class="alert alert-danger">'.$username_not_found.'</div>';} ?>
        <div>
          <input type="password" name="password" placeholder="Password" required="" class="form-control" value="<?php if(isset($password)){echo $password;} ?>"><br>
        </div>
         <?php if (isset($wrong_password)) {echo '<div class="alert alert-danger">'.$wrong_password.'</div>';} ?>
        <div class="text-center">
          <input type="submit" name="login" value="LogIn" class="btn btn-primary">
        </div>
        
      </form>


      
    </div>
     
   </div>
   <br>
   
   <p class="text-center"><a href="registration.php">Creat New Account</a></p>
   <br>

   <?php if (isset($status_inactive)) {echo '<div class="alert alert-danger col-sm-4 offset-4">'.$status_inactive.'</div>';} ?>

  
      
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>