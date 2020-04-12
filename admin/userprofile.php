<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small style="color: grey">My Profile</small></h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">

			<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> Profile</li>
		</ol>
	</nav>

	<?php

	$session_user = $_SESSION['user_login'];

	$user_data = mysqli_query($con,"SELECT * FROM `user_info` WHERE `username`= '$session_user'");
	$user_row = mysqli_fetch_assoc($user_data);



	?>

	<div class="row">
		<div class="col-sm-6">
			<table class="table table-bordered">
				<tr>
					<td>Name</td>
					<td><?= ucwords($user_row['name']) ?></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td><?= $user_row['username'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $user_row['email'] ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?= ucwords($user_row['status']) ?></td>
				</tr>
				<tr>
					<td>Signup Date</td>
					<td><?= $user_row['date'] ?></td>
				</tr>
			</table>

			<a href="index.php?page=updateprofile" class="btn btn-info btn-sm offset-9">Edit Profile</a>
			
		</div>
		<div class="col-sm-6">
			<a href=""><img class="img-thumbnail" width="200px" src="images/<?= $user_row['photo'] ?>"></a><br><br>

			<?php

               if (isset($_POST['update'])) {

               	$photo = explode('.', $_FILES['photo']['name']);
                $photo = end($photo);
                $photo_name = $session_user.'.'.$photo;

               $upload = mysqli_query($con,"UPDATE `user_info` SET `photo`='$photo_name' WHERE `username` = '$session_user'");

               if ($upload) {

               	move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
               	
               }
                	
                } 



			?>



			<form action="" enctype="multipart/form-data" method="POST">
				<label for="photo">Profile Picture</label><br>
				<input type="file" name="photo" required="" id="photo"><br><br>
				<input type="submit" name="update" value="Update" class="btn btn-info btn-sm"><br><br>
			</form>
			
		</div>
		
	</div>