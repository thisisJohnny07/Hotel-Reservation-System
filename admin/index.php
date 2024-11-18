<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
	$statement = $pdo->prepare("SELECT * FROM rooms");
	$statement->execute();
	$total_room = $statement->rowCount();

	$statement = $pdo->prepare("SELECT * FROM offers");
	$statement->execute();
	$total_offers = $statement->rowCount();

	$statement = $pdo->prepare("SELECT * FROM reservations");
	$statement->execute();
	$total_reservations = $statement->rowCount();

	$statement = $pdo->prepare("SELECT * FROM services");
	$statement->execute();
	$total_services = $statement->rowCount();

	$statement = $pdo->prepare("SELECT * FROM members");
	$statement->execute();
	$total_members = $statement->rowCount();

	$statement = $pdo->prepare("SELECT * FROM sliders");
	$statement->execute();
	$total_sliders = $statement->rowCount();
?>

<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_room; ?></h3>

                  <p>Rooms</p>
                </div>
                <div class="icon">
					<i class="ionicons ion-android-menu"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $total_offers; ?></h3>

                  <p>Offers</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_reservations; ?></h3>

                  <p>Reservations</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total_services; ?></h3>

                  <p>Services</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div>
			<!-- ./col -->
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-orange">
				  <div class="inner">
					<h3><?php echo $total_members; ?></h3>
  
					<p>Members</p>
				  </div>
				  <div class="icon">
				  	<i class="ionicons ion-person-stalker"></i>
				  </div>
				  
				</div>
			  </div>

			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $total_sliders; ?></h3>
  
					<p>Sliders</p>
				  </div>
				  <div class="icon">
				  	<i class="ionicons ion-arrow-up-b"></i>
				  </div>
				  
				</div>
			  </div>
		  </div>
		  
</section>

<?php require_once('footer.php'); ?>