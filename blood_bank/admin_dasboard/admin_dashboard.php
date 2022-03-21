<?php
	include('../header.php');
?>


		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Weekly Overview</h3>
							<!-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> -->
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Recipient Details</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Requester id</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Blood group</th>
												<th>Hospital name</th>
												<th>Email</th>
												<th>Contact</th>
												<th>Reason</th>
											</tr>
										</thead>
										<tbody>
											<?php
      $select = $connection->query("SELECT * FROM requester");
      while($row = $select->fetch_array()){ ?>
											<tr>
												<td><?php echo $row['requester_id'];?></td>
												<td><?php echo $row['patient_name'];?></td>
												<td><?php echo $row['gender'];?></td>
												<td><?php echo $row['blood_group'];?></td>
												<td><?php echo $row['hospital_name'];?></td>
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['contact_no'];?></td>
												<td><?php echo $row['reason'];?></td>
											</tr>
										<?php  }?>
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
					
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 Brought To You By <a href="http://code-projects.org/" target="_blank">Code-Projects</a>.</p>
			</div>
		</footer>
	</div>
	<?php
	include('../footer.php');
	?>