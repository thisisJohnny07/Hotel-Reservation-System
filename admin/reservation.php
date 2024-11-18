<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Reservations</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="30">#</th>
								<th>Member Name</th>
								<th>Number of Room</th>
								<th width="80">Check In</th>
                                <th width="80">Check out</th>
                                <th width="80">Arrival</th>
                                <th width="80">accessibility</th>
                                <th width="80">Purpose</th>
                                <th width="200">Request</th>
                                <th width="200">Change Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT reservations.*, members.firstName, members.lastName FROM reservations
                                                        INNER JOIN members ON members.id = reservations.memberId
                                                        ORDER BY reservations.status DESC, reservations.checkOut");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr class="<?php if($row['status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>" >
									<td><?php echo $i; ?></td>
									<td><?php echo $row['firstName'] . " " . $row['lastName'] ; ?></td>
                                    <td><?php echo $row['numberOfRoom']; ?></td>
									<td><?php echo $row['checkIn']; ?></td>
                                    <td><?php echo $row['checkOut']; ?></td>
                                    <td><?php echo $row['arrival']; ?></td>
									<td><?php echo $row['accessibility']; ?></td>
                                    <td><?php echo $row['purpose']; ?></td>
									<td><?php echo $row['specialRequest']; ?></td>
                                    <td><?php if($row['status']==1) {echo 'Active';} else {echo 'Inactive';} ?></td>
									<td>										
                                        <a href="room-change-status.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">Change Status</a>
									</td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>

<?php require_once('footer.php'); ?>