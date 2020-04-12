<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small style="color: grey">Update New Student</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square-o"></i> Update Student</li>
	</ol>
</nav>

<?php

  $id = base64_decode($_GET['id']);

  $db_data = mysqli_query($con,"SELECT * FROM `student_info` WHERE `id` = '$id'");

  $db_row = mysqli_fetch_assoc($db_data);

    if (isset($_POST['updatestudent'])) {

  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$city = $_POST['city'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];

  	$image = explode('.', $_FILES['image']['name']);
    $image_ex = end($image);
    $image_name = $roll.'.'.$image_ex;

    $qry = "UPDATE `student_info` SET `name`= '$name',`roll`= '$roll',`class`= '$class',`city`= '$city',`pcontact`= '$pcontact',`image`='$image_name' WHERE `id` = '$id'";

    $result = mysqli_query($con,$qry);

    if ($result) {

    	move_uploaded_file($_FILES['image']['tmp_name'], 'student images/'.$image_name);

    	header('location:index.php?page=allstudent');
    	
    }

  }





?>




<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" placeholder="Enter Student Name" id="name" class="form-control" required="" value="<?= $db_row['name'] ?>">
				
			</div>
			<div class="form-group">
				<label for="roll">Student ID</label>
				<input type="text" name="roll" placeholder="Enter Student ID" id="roll" class="form-control" pattern="[0-9]{6}" required="" value="<?= $db_row['roll'] ?>">
				
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" placeholder="City" id="city" class="form-control" required="" value="<?= $db_row['city'] ?>">
				
			</div>
			<div class="form-group">
				<label for="pcontact">Contact</label>
				<input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required="" value="<?= $db_row['pcontact'] ?>">
				
			</div>
			<div class="form-group">
				<label for="class">Department</label>
				<select id="class" class="form-control" name="class" required="">
					<option value="">Select</option>
					<option <?php echo $db_row['class']=='CSE' ? 'selected=""':''; ?> value="CSE">COMPUTER SCIENCE & ENGINEERING</option>
					<option <?php echo $db_row['class']=='EEE' ? 'selected=""':''; ?> value="EEE">ELECTRICAL & ELECTRONIC ENGINEERING</option>
					<option <?php echo $db_row['class']=='ETE' ? 'selected=""':''; ?> value="ETE">ELECTRONICS & TELECOMMUNICATION ENGINEERING</option>
					<option <?php echo $db_row['class']=='SE' ? 'selected=""':''; ?> value="SE">SOFTWARE ENGINEERING</option>
					<option <?php echo $db_row['class']=='TE' ? 'selected=""':''; ?> value="TE">TEXTILE ENGINEERING</option>
					
				</select>
				
			</div>

			<div class="form-group">
				<label for="image">Image</label><br>
				<input type="file" name="image" id="image" required="" value="<?= $db_row['image'] ?>">
				
			</div>

			<div class="form-group">
				<input type="submit" value="Update Student" name="updatestudent" class="btn btn-success offset-9">
				
			</div>
			
			
		</form>
		
	</div>
	
</div>