<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small style="color: grey">All Users</small></h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Users</li>
	</ol>
</nav>

<div class="table-responsive">

	<table id="data" class="table table-hover table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>Photo</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$no = 1;

		$db_sinfo = mysqli_query($con,"SELECT * FROM `user_info`");

		while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
						    

		<tr>
			<td><?php echo $no ; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><img style="width: 100px" src="images/<?php echo $row['photo']; ?>"></td>
		</tr>



		<?php
		$no++;	    
		}
		?>



					
						
	</tbody>
					
</table>
					
</div>