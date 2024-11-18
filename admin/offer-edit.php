<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;
	
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

	if($valid == 1) {

		if($path == '') {
			$statement = $pdo->prepare("UPDATE offers SET title=?, roomId=?, adult=?, children=?, points=?, start=?, end=?, rate=?, availableRoom=? WHERE id=?");
    		$statement->execute(array($_POST['title'],$_POST['roomId'],$_REQUEST['adult'],$_POST['children'],$_POST['points'],$_REQUEST['start'],$_POST['end'],$_REQUEST['rate'],$_REQUEST['availableRoom'],$_REQUEST['id']));
		} else {

			unlink('../assets/uploads/'.$_POST['current_photo']);

			$final_name = 'offer-'.$_REQUEST['id'].'.'.$ext;
        	move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

        	$statement = $pdo->prepare("UPDATE offers SET title=?, roomId=?, adult=?, children=?, points=?, start=?, end=?, rate=?, availableRoom=?, photo=? WHERE id=?");
    		$statement->execute(array($_POST['title'],$_POST['roomId'],$_REQUEST['adult'],$_POST['children'],$_POST['points'],$_REQUEST['start'],$_POST['end'],$_REQUEST['rate'],$_REQUEST['availableRoom'],$final_name,$_REQUEST['id']));
		}	   

	    $success_message = 'Service is updated successfully!';
	}
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM offers WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Service</h1>
	</div>
	<div class="content-header-right">
		<a href="offer.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM offers WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$title = $row['title'];
    $rate = $row['rate'];
    $start = $row['start'];
    $end = $row['end'];
    $adult = $row['adult'];
    $children = $row['children'];
    $points = $row['points'];
	$photo = $row['photo'];
    $selectedRoomId = $row['roomId'];
	$availableRoom = $row['availableRoom'];
}
?>

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
				<input type="hidden" name="current_photo" value="<?php echo $photo; ?>">
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Title <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo $title; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Room<span class="text-danger ml-2">*</span></label>
                            <div class="col-sm-6">
                                <?php
                                    $qry = "SELECT * FROM rooms ORDER BY roomName ASC";
                                    $result = $pdo->query($qry);        
                                    if ($result->rowCount() > 0) {
                                        echo '<select required name="roomId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
                                        echo '<option value="">--Select Room--</option>';
                                        while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                            $selected = ($rows['id'] == $selectedRoomId) ? 'selected' : '';
                                            echo '<option value="'.$rows['id'].'" '.$selected.'>'.$rows['roomName'].'</option>';
                                        }
                                        echo '</select>';
                                    }
                                ?>  
                            </div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Rate <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="rate" value="<?php echo $rate; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Available Rooms <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="availableRoom" value="<?php echo $availableRoom; ?>" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Start Date <span>*</span></label>
							<div class="col-sm-6">
                            <input type="datetime-local" autocomplete="off" class="form-control" name="start" value="<?php echo $start; ?>" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">End Date <span>*</span></label>
							<div class="col-sm-6">
                            <input type="datetime-local" autocomplete="off" class="form-control" name="end" value="<?php echo $end; ?>" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Adult <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="adult" value="<?php echo $adult; ?>" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Children <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="children" value="<?php echo $children; ?>" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Points <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="points" value="<?php echo $points; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Photo</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="../assets/uploads/<?php echo $photo; ?>" alt="Service Photo" style="width:180px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Photo </label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
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