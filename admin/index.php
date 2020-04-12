<?php
 include 'connection.php';
 session_start();

 if (!isset($_SESSION['user_login'])) {

 	header('location: login.php');
 	
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
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">


    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>

    <title>Student Management System</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="../images/unnamed.png" class="img-fluid" style="width: 50px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=userprofile"><i class="fa fa-user"></i> Welcome: <?php if (isset($_SESSION['user_login'])) {echo $_SESSION['user_login'];} ?></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="registration.php"><i class="fa fa-user-plus"></i> Add User</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="index.php?page=userprofile"><i class="fa fa-user"></i> Profile</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group" id="myList">
				  <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-tachometer"></i> Dashboard</a>
				  <a href="index.php?page=addstudent" class="list-group-item list-group-item-action "><i class="fa fa-user-plus"></i> Add Student</a>
				  <a href="index.php?page=allstudent" class="list-group-item list-group-item-action "><i class="fa fa-users"></i> All Student</a>
				  <a href="index.php?page=alluser" class="list-group-item list-group-item-action "><i class="fa fa-user"></i> All Users</a>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="content">

				<?php

        if (isset($_GET['page'])) {
					
					$page = $_GET['page'].'.php';
				}else {
					$page = 'dashboard.php';
				}

				if (file_exists($page)) {

					include $page;
					
				}

				?>
				
				
				
			</div>
			
		</div>
		
	</div>
	
</div>


<footer class="footer-area">
	<p>Copyright &copy; 2020. Student Management System. All Rights Are Reserved</p>
</footer>

  
  </body>
</html>