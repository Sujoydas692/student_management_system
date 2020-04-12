<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Profile <small style="color: grey">Update Profile</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square"></i> Update Profile</li>
	</ol>
</nav>

<?php

  $session_user = $_SESSION['user_login'];

	$user_data = mysqli_query($con,"SELECT * FROM `user_info` WHERE `username`= '$session_user'");
	$user_row = mysqli_fetch_assoc($user_data);

    if (isset($_POST['updateprofile'])) {

  	$name = $_POST['name'];
  	$email = $_POST['email'];


    $qry = "UPDATE `user_info` SET `name`='$name',`email`='$email' WHERE `username` = '$session_user'";

    $result = mysqli_query($con,$qry);

    if ($result) {

    	
        
    	header('location:index.php?page=userprofile');
    	
    }

  }





?>




<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="Enter Name" id="name" class="form-control" required="" value="<?= $user_row['name'] ?>">
				
			</div>
			<div class="form-group">
				<label for="roll">Email</label>
				<input type="text" name="email" placeholder="Enter Email" id="email" class="form-control" required="" value="<?= $user_row['email'] ?>">
				
			</div>

			<div class="form-group">
				<input type="submit" value="Update Profile" name="updateprofile" class="btn btn-success offset-9">
				
			</div>
			
			
		</form>
		
	</div>
	
</div>