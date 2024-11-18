<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

	if(empty($_POST['roomType']) || empty($_POST['title']) || empty($_POST['description']) || empty($_POST['childrenMealPlan']) || empty($_POST['categoryId'])) {
        $error_message = 'All fields are required.';
		$valid = 0;
    }

	if (isset($_FILES['photos']['name']) && !empty($_FILES['photos']['name'][0])) {
		foreach($_FILES['photos']['name'] as $key => $value) {
			$fileName = $_FILES['photos']['name'][$key];
			$fileTmp = $_FILES['photos']['tmp_name'][$key];
			$ext = pathinfo($fileName, PATHINFO_EXTENSION);
			if(!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
				$error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
				$valid = 0;
				break;
			}
		}
	} else {
		$error_message .= 'You must upload at least one photo.';
        $valid = 0;
	}

	if ($valid = 1) {
		$roomType = $_POST['roomType'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$childrenMealPlan = $_POST['childrenMealPlan'];
		$categoryId = $_POST['categoryId'];

		$statement = $pdo->prepare("INSERT INTO rooms (roomName, titleHeader, description, childrenMealPlan, roomCategoryId) VALUES (?,?,?,?,?)");
		$statement->execute(array($roomType,$title,$description,$childrenMealPlan,$categoryId));
		
		$roomId = $pdo->lastInsertId();

		if (isset($_FILES['photos']['name']) && !empty($_FILES['photos']['name'][0])) {
			foreach ($_FILES['photos']['name'] as $key => $value) {
				$fileName = $_FILES['photos']['name'][$key];
				$ext = pathinfo($fileName, PATHINFO_EXTENSION);
				$finalName = 'Room-' . $roomId . '-' . $key . '.' . $ext;
				move_uploaded_file($_FILES['photos']['tmp_name'][$key], '../assets/uploads/' . $finalName);
				$addImage = $pdo->prepare("INSERT INTO images (roomId, image) VALUES (?, ?)");
				$addImage->execute(array($roomId, $finalName));
			}
		}

		if(isset($_POST['features']) && is_array($_POST['features'])) {
            foreach($_POST['features'] as $featureId) {
                $statement = $pdo->prepare("INSERT INTO roomfeatures (roomId, featureId) VALUES (?,?)");
                $statement->execute(array($roomId, $featureId));
            }
        }

		if(isset($_POST['amenities']) && is_array($_POST['amenities'])) {
            foreach($_POST['amenities'] as $amenitiesId) {
                $statement = $pdo->prepare("INSERT INTO roomamenities (roomId, amenitiesId) VALUES (?,?)");
                $statement->execute(array($roomId, $amenitiesId));
            }
        }

		$success_message = 'Service is added successfully!';
		unset($_POST['roomType']);
        unset($_POST['title']);
        unset($_POST['description']);
        unset($_POST['childrenMealPlan']);
        unset($_POST['categoryId']);
	}
	
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Service</h1>
	</div>
	<div class="content-header-right">
		<a href="room.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
				<p>
					<?php echo $error_message; ?>
				</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
				<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Room Type <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="roomType" required value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title Header<span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="title" required value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" required name="description" style="height:200px;"><?php if(isset($_POST['content'])){echo $_POST['content'];} ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Children Meal Plan <span>*</span></label>
							<div class="col-sm-6">
								<textarea class="form-control" required name="childrenMealPlan" style="height:200px;"><?php if(isset($_POST['content'])){echo $_POST['content'];} ?></textarea>
							</div>
						</div>

						<div class="form-group" >
							<label for="" class="col-sm-2 control-label">Category<span class="text-danger ml-2">*</span></label>
							<div class="col-sm-6">
								<?php
									$qry= "SELECT * FROM roomcategories ORDER BY category ASC";
									$result = $pdo->query($qry);		
									if ($result->rowCount() > 0){
									echo ' <select required name="categoryId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
									echo'<option value="">--Select Class--</option>';
									while ($rows = $result->fetch(PDO::FETCH_ASSOC)){
									echo'<option value="'.$rows['id'].'" >'.$rows['category'].'</option>';
										}
											echo '</select>';
									}
								?>  
							</div>
                    	</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Room Images<span>*</span></label>
							<div class="col-sm-6">
								<input type="file" autocomplete="off" class="form-control" name="photos[]" multiple required value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Features <span>*</span></label>
							<div class="col-sm-6">
								<?php
									$qry = "SELECT * FROM features ORDER BY featureName ASC";
									$result = $pdo->query($qry);
									if ($result->rowCount() > 0) {
										echo '<div class="mb-3">';
										while ($rows = $result->fetch(PDO::FETCH_ASSOC)){
											echo '<div class="form-check">';
											echo '<input type="checkbox" name="features[]" value="'.$rows['id'].'" class="form-check-input" id="feature_'.$rows['id'].'">';
											echo '<label class="form-check-label" for="feature_'.$rows['id'].'">'.$rows['featureName'].'</label>';
											echo '</div>';
										}
										echo '</div>';
									} else {
										echo "No features found.";
									}
								?>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Amenities<span>*</span></label>
							<div class="col-sm-6">
								<?php
								$qry = "SELECT a.id, a.categoryId, a.description, c.category
										FROM amenities a
										INNER JOIN amenitiescategories c ON c.id = a.categoryId
										ORDER BY c.category ASC";
								$result = $pdo->query($qry);
								$currentCategory = null;

								if ($result->rowCount() > 0) {
									echo '<div class="mb-3">';
									while ($rows = $result->fetch(PDO::FETCH_ASSOC)){
										// Check if the category has changed
										if ($rows['category'] != $currentCategory) {
											if ($currentCategory !== null) {
												echo '</ul>';
											}
											echo '<h4>'.$rows['category'].'</h4>';
											echo '<ul type="none">';
											$currentCategory = $rows['category'];
										}

										echo '<li>';
										echo '<div class="form-check">';
										echo '<input type="checkbox" name="amenities[]" value="'.$rows['id'].'" class="form-check-input" id="feature_'.$rows['id'].'">';
										echo '<label class="form-check-label" for="amenities_'.$rows['id'].'">'.$rows['description'].'</label>';
										echo '</div>';
										echo '</li>';
									}
									echo '</ul>';
									echo '</div>';
								}
								?>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>