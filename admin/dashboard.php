<h1 class="text-primary"><i class="fa fa-tachometer"></i> Dashboard <small style="color: grey">Statistics Overview</small></h1>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-tachometer"></i> Dashboard</li>
				  </ol>
				</nav>

				<?php

				$countstudent = mysqli_query($con,"SELECT * FROM `student_info`");
				$totalstudent = mysqli_num_rows($countstudent);

				$countuser = mysqli_query($con,"SELECT * FROM `user_info`");
				$totaluser = mysqli_num_rows($countuser);





				?>

				<div class="row">
					<div class="col-sm-4">
						<div class="card text-white bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-xl-3">
										<i class="fa fa-users fa-5x"></i>
										
									</div>
									<div class="col-xl-9">

										<div class="offset-8" style="font-size: 45px"><?= $totalstudent; ?></div>
										<div class="offset-7">All Student</div>
										
									</div>
									
								</div>
								
							</div>
							<a href="index.php?page=allstudent" class="list-group-item-action">
								<div class="card">
								<div class="card-header">
								 <span>All Student</span>
								<span class="offset-7"><i class="fa fa-arrow-circle-right"></i></span>
							</div>
							</div>
							</a>
							
							
						</div>
						
						
					</div>
					<div class="col-sm-4">
						<div class="card text-white bg-primary">
							<div class="card-header">
								<div class="row">
									<div class="col-xl-3">
										<i class="fa fa-users fa-5x"></i>
										
									</div>
									<div class="col-xl-9">

										<div class="offset-8" style="font-size: 45px"><?= $totaluser; ?></div>
										<div class="offset-8">All User</div>
										
									</div>
									
								</div>
								
							</div>
							<a href="index.php?page=alluser" class="list-group-item-action">
								<div class="card">
								<div class="card-header">
								 <span>All User</span>
								<span class="offset-8"><i class="fa fa-arrow-circle-right"></i></span>
							</div>
							</div>
							</a>
							
							
						</div>
						
						
					</div>
					
				</div>

				<hr>
				<h3>New Students</h3>
				<div class="table-responsive">

					<table id="data" class="table table-hover table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Student ID</th>
							<th>City</th>
							<th>Contact</th>
							<th>Photo</th>
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
							<td><?php echo ucwords($row['city']); ?></td>
							<td><?php echo $row['pcontact']; ?></td>
							<td><img style="width: 100px" src="student images/<?php echo $row['image']; ?>"></td>
						</tr>



						<?php
						$no++;	    
						}
						?>



					
						
					</tbody>
					
				</table>
					
				</div>