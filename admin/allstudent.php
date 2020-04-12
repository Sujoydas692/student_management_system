<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small style="color: grey">Update/Delete Student</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Student</li>
	</ol>
</nav>

<div class="table-responsive">

	<table id="data" class="table table-hover table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Student ID</th>
			<th>Dep.</th>
			<th>City</th>
			<th>Contact</th>
			<th>Photo</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$no = 1;

		$db_sinfo = mysqli_query($con,"SELECT * FROM `student_info`");

		while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
						    

		<tr>
			<td><?php echo $no ; ?></td>
			<td><?php echo ucwords($row['name']); ?></td>
			<td><?php echo $row['roll']; ?></td>
			<td><?php echo $row['class']; ?></td>
			<td><?php echo ucwords($row['city']); ?></td>
			<td><?php echo $row['pcontact']; ?></td>
			<td><img style="width: 100px" src="student images/<?php echo $row['image']; ?>"></td>
			<td>
				<a href="index.php?page=updatestudent&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil-square-o"></i> Update</a>
				
				<a href="deletestudent.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
			</td>
		</tr>



		<?php
		$no++;	    
		}
		?>



					
						
	</tbody>
					
</table>
					
</div>