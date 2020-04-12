<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small style="color: grey">Add New Student</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student</li>
	</ol>
</nav>

<?php
  
  if (isset($_POST['addstudent'])) {

  	$name = $_POST['name'];
  	$roll = $_POST['roll'];
  	$city = $_POST['city'];
  	$pcontact = $_POST['pcontact'];
  	$class = $_POST['class'];

  	$image = explode('.', $_FILES['image']['name']);
    $image_ex = end($image);
    $image_name = $roll.'.'.$image_ex;

    $qry = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `image`) VALUES ('$name','$roll','$class','$city','$pcontact','$image_name')";

    $result = mysqli_query($con,$qry);

    if ($result) {

    	  $success = "Success";

                     
        //function//s
    	move_uploaded_file($_FILES['image']['tmp_name'], 'student images/'.$image_name);

    	
                    
    	
    }else {

    	$error = "Wrong";
    	
    }
  }



?>

<div class="row">

	<?php if (isset($success)) {echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>

	<?php if (isset($error)) {echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>
	
</div>





<div class="row">
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" placeholder="Enter Student Name" id="name" class="form-control" required="">
				
			</div>
			<div class="form-group">
				<label for="roll">Student ID</label>
				<input type="text" name="roll" placeholder="Enter Student ID" id="roll" class="form-control" pattern="[0-9]{6}" required="">
				
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" placeholder="City" id="city" class="form-control" required="">
				
			</div>
			<div class="form-group">
				<label for="pcontact">Contact</label>
				<input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required="">
				
			</div>
			<div class="form-group">
				<label for="class">Department</label>
				<select id="class" class="form-control" name="class" required="">
					<option value="">Select</option>
					<option value="CSE">COMPUTER SCIENCE & ENGINEERING</option>
					<option value="EEE">ELECTRICAL & ELECTRONIC ENGINEERING</option>
					<option value="ETE">ELECTRONICS & TELECOMMUNICATION ENGINEERING</option>
					<option value="SE">SOFTWARE ENGINEERING</option>
					<option value="TE">TEXTILE ENGINEERING</option>
					
				</select>
				
			</div>

			<div class="form-group">
				<label for="image">Image</label><br>
				<input type="file" name="image" id="image" required="">
				
			</div>
			<div class="form-group">
				<input type="submit" value="Add Student" name="addstudent" class="btn btn-success offset-9">
				
			</div>
			
			
		</form>
		
	</div>
	
</div>