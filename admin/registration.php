<?php
  
  include 'connection.php';
  session_start();

?>


<?php

  
  
  if (isset($_POST['registration'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];


    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;

    $input_error = array();

    if (empty($name)) {
      $input_error['name'] = "The name field is required.";
    }

    if (empty($email)) {
      $input_error['email'] = "The email field is required.";
    }

    if (empty($username)) {
      $input_error['username'] = "The username field is required.";
    }

    if (empty($password)) {
      $input_error['password'] = "The password field is required.";
    }

    if (empty($c_password)) {
      $input_error['c_password'] = "The confirm password field is required.";
    }

    if (count($input_error) == 0) {
      $email_check = mysqli_query($con,"SELECT * FROM `user_info` WHERE `email` = '$email';");

      if (mysqli_num_rows($email_check) == 0) {
         
         $username_check = mysqli_query($con,"SELECT * FROM `user_info` WHERE `username` = '$username';");

         if (mysqli_num_rows($username_check) == 0) {
            
            if (strlen($username) > 7) {

              if (strlen($password) > 7) {

                if ($password == $c_password) {

                  $password = md5($password);

                  $qury = "INSERT INTO `user_info`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES('$name','$email','$username','$password','$photo_name','inactive')";

                  $result = mysqli_query($con,$qury);

                  if ($result) {

                     $_SESSION['data_insert_success'] = "Data Insert Success!";

                     //function//
                     move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                     header('location: registration.php');
                    
                  }else {

                    $_SESSION['data_insert_error'] = "Data Insert Error!";
                    
                  }



                }else {
                  $password_not_match = "Password Not Match";
                }
                
              }else {
                $password_ln = "Password More Than 8 Characters";
              }


              
            }else {
              
              $username_ln = "Username More Than 8 characters";
            }
          
         }else {
           $username_error = "This Username Already Exists";
         }
        
        
      }else {
        $email_error = "This Email Address Already Exists";
      }

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
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Student Management System</title>
  </head>
  <body>

    <div class="container">
      <br>
      <h1 class="text-center">Resistration From</h1>

      <?php if (isset($_SESSION['data_insert_success'])) {echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
      <?php if (isset($_SESSION['data_insert_error'])) {echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>
      <hr>

      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name" class="col-sm-4 offset-4">Name</label>
              <div class="col-sm-4 offset-4">
                
                <input id="name" type="text" name="name" placeholder="Enter your name" class="form-control" value="<?php if(isset($name)){echo$name;} ?>">
                <label class="error"><?php if (isset($input_error['name'])) {echo $input_error['name'];} ?></label>
                
              </div>
              
              
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 offset-4">Email</label>
              <div class="col-sm-4 offset-4">
                <input id="email" type="text" name="email" placeholder="Enter your email" class="form-control" value="<?php if(isset($email)){echo$email;} ?>">
                <label class="error"><?php if (isset($input_error['email'])) {echo $input_error['email'];} ?></label>
                 <label class="error"><?php if (isset($email_error)) {echo $email_error;} ?></label>
                
              </div>
              
            </div>
            <div class="form-group">
              <label for="username" class="col-sm-4 offset-4">Username</label>
              <div class="col-sm-4 offset-4">
                <input id="username" type="text" name="username" placeholder="Enter your Username" class="form-control" value="<?php if(isset($username)){echo$username;} ?>">
                <label class="error"><?php if (isset($input_error['username'])) {echo $input_error['username'];} ?></label>
                <label class="error"><?php if (isset($username_error)) {echo $username_error;} ?></label>
                <label class="error"><?php if (isset($username_ln)) {echo $username_ln;} ?></label>
                
              </div>
              
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-4 offset-4">Password</label>
              <div class="col-sm-4 offset-4">
                <input id="password" type="password" name="password" placeholder="Enter your password" class="form-control" value="<?php if(isset($password)){echo$password;} ?>">
                <label class="error"><?php if (isset($input_error['password'])) {echo $input_error['password'];} ?></label>
                <label class="error"><?php if (isset($password_ln)) {echo $password_ln;} ?></label>
                
              </div>
              
            </div>
            <div class="form-group">
              <label for="c_password" class="col-sm-4 offset-4">Confirm Password</label>
              <div class="col-sm-4 offset-4">
                <input id="c_password" type="password" name="c_password" placeholder="Confirm your password" class="form-control" value="<?php if(isset($c_password)){echo$c_password;} ?>">
                <label class="error"><?php if (isset($input_error['c_password'])) {echo $input_error['c_password'];} ?></label>
                 <label class="error"><?php if (isset($password_not_match)) {echo $password_not_match;} ?></label>
                
              </div>
              
            </div>
             <div class="form-group">
              <label for="photo" class="col-sm-4 offset-4">Image</label>
              <div class="col-sm-4 offset-4">
                <input id="photo" type="file" name="photo">
                
              </div>
              
            </div>
            <div class="col-sm-4 offset-5">
              <input type="submit" name="registration" value="Sign Up" class="btn btn-success">
              
            </div>

            
          </form>


          
        </div>
        
      </div>
      <br>

      <p class="text-center">Already have an account? please <a href="login.php">LogIn</a></p>
      
    </div>
   
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>