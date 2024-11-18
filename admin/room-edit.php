<?php require_once('header.php'); ?>

<?php

    if(isset($_POST['form_about'])) {
        
        $valid = 1;

        if(empty($_POST['roomName']) || empty($_POST['titleHeader']) || empty($_POST['description']) || empty($_POST['categoryId'])) {
            $error_message = 'All fields are required.';
            $valid = 0;
        }


        $path = $_FILES['photos']['name'];
        $path_tmp = $_FILES['photos']['tmp_name'];

        if($valid == 1) {
            $roomName = $_POST['roomName'];
            $title = $_POST['titleHeader'];
            $description = $_POST['description'];
            $childrenMealPlan = $_POST['childrenMealPlan'];
            $categoryId = $_POST['categoryId'];
            $roomId = $_GET['id']; // Retrieve the id from the URL parameter

            $selectedFeatures = isset($_POST['features']) ? $_POST['features'] : [];
            $existingFeatures = [];
            $selectedAmenities = isset($_POST['amenities']) ? $_POST['amenities'] : [];
            $existingAmenities = [];


            $stmt = $pdo->prepare("SELECT featureId FROM roomFeatures WHERE roomId = ?");
            $stmt->execute([$roomId]);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $existingFeatures[] = $row['featureId'];
            }

            $featuresToAdd = array_diff($selectedFeatures, $existingFeatures);
            $featuresToRemove = array_diff($existingFeatures, $selectedFeatures);

            $stmt = $pdo->prepare("SELECT amenitiesId FROM roomAmenities WHERE roomId = ?");
            $stmt->execute([$roomId]);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $existingAmenities[] = $row['amenitiesId'];
            }

            $amenitiesToAdd = array_diff($selectedAmenities, $existingAmenities);
            $amenitiesToRemove = array_diff($existingAmenities, $selectedAmenities);

            if($_FILES['photos']['error'][0] != UPLOAD_ERR_NO_FILE) {
                foreach($_FILES['photos']['name'] as $key => $value) {
                    $fileName = $_FILES['photos']['name'][$key];
                    $fileTmp = $_FILES['photos']['tmp_name'][$key];
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    if(!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                        $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
                        break;
                    }
                }
        
                if (isset($_FILES['photos']['name']) && !empty($_FILES['photos']['name'][0])) {
                    // Remove existing images from the folder
                    $existingImages = glob('../assets/uploads/Room-' . $roomId . '-*');
                    foreach ($existingImages as $file) {
                        unlink($file);
                    }

                    $deleteExcessImages = $pdo->prepare("DELETE FROM images WHERE roomId=?");
                    $deleteExcessImages->execute([$roomId]);
                
                    foreach ($_FILES['photos']['name'] as $key => $value) {
                        $fileName = $_FILES['photos']['name'][$key];
                        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                        $finalName = 'Room-' . $roomId . '-' . $key . '.' . $ext;
                
                        // Move the uploaded file to the uploads folder
                        move_uploaded_file($_FILES['photos']['tmp_name'][$key], '../assets/uploads/' . $finalName);

                        $insertImage = $pdo->prepare("INSERT INTO images (roomId, image) VALUES (?, ?)");
                        $insertImage->execute([$roomId, $finalName]);
                    }
                }                

                // Insert new features
                foreach ($featuresToAdd as $featureId) {
                    $insertRoomFeature = $pdo->prepare("INSERT INTO roomFeatures (roomId, featureId) VALUES (?, ?)");
                    $insertRoomFeature->execute([$roomId, $featureId]);
                }

                // Remove features no longer selected
                foreach ($featuresToRemove as $featureId) {
                    $deleteRoomFeature = $pdo->prepare("DELETE FROM roomFeatures WHERE roomId = ? AND featureId = ?");
                    $deleteRoomFeature->execute([$roomId, $featureId]);
                }

                // Insert new amenities
                foreach ($amenitiesToAdd as $amenitiesId) {
                    $insertRoomAmenities = $pdo->prepare("INSERT INTO roomAmenities (roomId, amenitiesId) VALUES (?, ?)");
                    $insertRoomAmenities->execute([$roomId, $amenitiesId]);
                }

                // Remove Amenities no longer selected
                foreach ($amenitiesToRemove as $amenitiesId) {
                    $deleteRoomAmenities = $pdo->prepare("DELETE FROM roomAmenities WHERE roomId = ? AND amenitiesId = ?");
                    $deleteRoomAmenities->execute([$roomId, $amenitiesId]);
                }

                // updating the database
                $statement = $pdo->prepare("UPDATE rooms SET roomName=?, titleHeader=?, description=?, childrenMealPlan=?, roomCategoryId=? WHERE id=?");
                $statement->execute(array($roomName, $title, $description, $childrenMealPlan, $categoryId, $roomId));

            } else {
                // Insert new features
                foreach ($featuresToAdd as $featureId) {
                    $insertRoomFeature = $pdo->prepare("INSERT INTO roomFeatures (roomId, featureId) VALUES (?, ?)");
                    $insertRoomFeature->execute([$roomId, $featureId]);
                }

                // Remove features no longer selected
                foreach ($featuresToRemove as $featureId) {
                    $deleteRoomFeature = $pdo->prepare("DELETE FROM roomFeatures WHERE roomId = ? AND featureId = ?");
                    $deleteRoomFeature->execute([$roomId, $featureId]);
                }

                // Insert new amenities
                foreach ($amenitiesToAdd as $amenitiesId) {
                    $insertRoomAmenities = $pdo->prepare("INSERT INTO roomAmenities (roomId, amenitiesId) VALUES (?, ?)");
                    $insertRoomAmenities->execute([$roomId, $amenitiesId]);
                }

                // Remove Amenities no longer selected
                foreach ($amenitiesToRemove as $amenitiesId) {
                    $deleteRoomAmenities = $pdo->prepare("DELETE FROM roomAmenities WHERE roomId = ? AND amenitiesId = ?");
                    $deleteRoomAmenities->execute([$roomId, $amenitiesId]);
                }

                // updating the database
                $statement = $pdo->prepare("UPDATE rooms SET roomName=?, titleHeader=?, description=?, childrenMealPlan=?, roomCategoryId=? WHERE id=?");
                $statement->execute(array($roomName, $title, $description, $childrenMealPlan, $categoryId, $roomId));
            }

            $success_message = 'About Page Information is updated successfully.';
            
        }
        
    }

?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Page Settings</h1>
    </div>
</section>

<?php
    $statement = $pdo->prepare("SELECT i.image, roomName, titleHeader, description, childrenMealPlan, roomCategoryId,
        GROUP_CONCAT(DISTINCT f.featureId) AS featureIds,
        GROUP_CONCAT(DISTINCT a.amenitiesId) AS amenityIds
        FROM rooms r
        INNER JOIN roomcategories c ON r.roomCategoryId = c.id
        LEFT JOIN images i ON i.roomId = r.id
        LEFT JOIN roomFeatures f ON f.roomId = r.id
        LEFT JOIN roomAmenities a ON a.roomId = r.id
        WHERE r.id=?
        GROUP BY i.image, roomName, titleHeader, description, childrenMealPlan, roomCategoryId");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        $roomName = $result[0]['roomName'];
        $titleHeader = $result[0]['titleHeader'];
        $description = $result[0]['description'];
        $childrenMealPlan = $result[0]['childrenMealPlan'];
        $category = $result[0]['roomCategoryId'];

        foreach ($result as $row) {
            $images[] = $row['image'];
            // Split the comma-separated featureIds and amenityIds into arrays
            $roomFeatures[] = explode(',', $row['featureIds']);
            $roomAmenities[] = explode(',', $row['amenityIds']);
        }
    }
?>




<section class="content" style="min-height:auto;margin-bottom: -30px;">
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
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
								<div class="box box-info">
									<div class="box-body">

										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Room Name</label>
											<div class="col-sm-5">
												<input class="form-control" type="text" name="roomName" value="<?php echo $roomName; ?>">
											</div>
										</div>

										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Title Header</label>
											<div class="col-sm-5">
												<input class="form-control" type="text" name="titleHeader" value="<?php echo $titleHeader; ?>">
											</div>
										</div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-5">
                                                <?php
                                                    $qry = "SELECT * FROM roomcategories ORDER BY category ASC";
                                                    $result = $pdo->query($qry);      
                                                    if ($result->rowCount() > 0) {
                                                        echo '<select class="form-control" name="categoryId" onchange="classArmDropdown(this.value)">';
                                                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                                            $selected = ($rows['id'] == $category) ? 'selected' : ''; // Check if current category matches the id from the database
                                                            echo '<option value="'.$rows['id'].'" '.$selected.'>'.$rows['category'].'</option>';
                                                        }
                                                        echo '</select>';
                                                    }
                                                ?>  
                                            </div>
                                        </div>

										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Description </label>
											<div class="col-sm-8">
												<textarea class="form-control" name="description" style="height:100px;"><?php echo $description; ?></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Children Meal Plan</label>
											<div class="col-sm-8">
												<textarea class="form-control" name="childrenMealPlan" id="editor1"><?php echo $childrenMealPlan; ?></textarea>
											</div>
										</div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-3 control-label">Existing Banner Photos</label>
                                            <div class="col-sm-6" style="padding-top:6px;">
                                                <?php
                                                foreach ($images as $image) {
                                                    echo '<img src="../assets/uploads/'.$image.'" class="existing-photo" style="height:80px; margin-right: 10px;">';
                                                }
                                                ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="" class="col-sm-3 control-label">Update Room Images<span>*</span></label>
                                            <div class="col-sm-6">
                                                <input type="file" autocomplete="off" class="form-control" name="photos[]" multiple accept="image/*" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="" class="col-sm-3 control-label">Features <span>*</span></label>
                                            <div class="col-sm-6">
                                            <?php
                                                $qry = "SELECT * FROM features ORDER BY featureName ASC";
                                                $result = $pdo->query($qry);
                                                if ($result->rowCount() > 0) {
                                                    echo '<div class="mb-3">';
                                                    while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        // Initialize $isChecked to empty string
                                                        $isChecked = '';
                                                        // Loop through each feature ID array in $roomFeatures
                                                        foreach ($roomFeatures as $featureIds) {
                                                            // Check if the current feature ID exists in the array
                                                            if (in_array($rows['id'], $featureIds)) {
                                                                $isChecked = 'checked';
                                                                // Break the loop once the feature ID is found
                                                                break;
                                                            }
                                                        }
                                                        echo '<div class="form-check">';
                                                        echo '<input type="checkbox" name="features[]" value="'.$rows['id'].'" class="form-check-input" id="feature_'.$rows['id'].'" '.$isChecked.'>';
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
                                            <label for="" class="col-sm-3 control-label">Amenities<span>*</span></label>
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
                                                        // Initialize $isChecked to empty string
                                                        $isChecked = '';
                                                        // Loop through each feature ID array in $roomFeatures
                                                        foreach ($roomAmenities as $amenitiesIds) {
                                                            // Check if the current feature ID exists in the array
                                                            if (in_array($rows['id'], $amenitiesIds)) {
                                                                $isChecked = 'checked';
                                                                // Break the loop once the feature ID is found
                                                                break;
                                                            }
                                                        }
                                                        echo '<li>';
                                                        echo '<div class="form-check">';
                                                        echo '<input type="checkbox" name="amenities[]" value="'.$rows['id'].'" class="form-check-input" id="feature_'.$rows['id'].'" '.$isChecked.'>';
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
											<label for="" class="col-sm-3 control-label"></label>
											<div class="col-sm-6">
												<button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
											</div>
										</div>
									</div>
								</div>
                            </form>
                        </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>