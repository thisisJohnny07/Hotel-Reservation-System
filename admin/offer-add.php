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
    } else {
    	$valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    }

	if($valid == 1) {

		// getting auto increment id
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'offers'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}

		$final_name = 'offer-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );
	
		$statement = $pdo->prepare("INSERT INTO offers (title,roomId,adult,children,points,photo,start,end,rate,availableRoom) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$statement->execute(array($_POST['title'],$_POST['roomId'],$_POST['adult'],$_POST['children'],$_POST['points'],$final_name,$_POST['start'],$_POST['end'],$_POST['rate'],$_POST['availableRoom']));
			
		$success_message = 'Service is added successfully!';

		unset($_POST['title']);
		unset($_POST['roomId']);
		unset($_POST['rate']);
		unset($_POST['adult']);
		unset($_POST['children']);
        unset($_POST['points']);
		unset($_POST['start']);
		unset($_POST['end']);
		unset($_POST['availableRoom']);


	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Service</h1>
	</div>
	<div class="content-header-right">
		<a href="offer.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" autocomplete="off" class="form-control" name="title" required>
							</div>
						</div>
                        <div class="form-group" >
							<label for="" class="col-sm-2 control-label">Room<span class="text-danger ml-2">*</span></label>
							<div class="col-sm-6">
								<?php
									$qry= "SELECT * FROM rooms ORDER BY roomName ASC";
									$result = $pdo->query($qry);		
									if ($result->rowCount() > 0){
									echo ' <select required name="roomId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
									echo'<option value="">--Select Class--</option>';
									while ($rows = $result->fetch(PDO::FETCH_ASSOC)){
									echo'<option value="'.$rows['id'].'" >'.$rows['roomName'].'</option>';
										}
											echo '</select>';
									}
								?>  
							</div>
                    	</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Rate <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="rate" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Number of Room Available <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="availableRoom" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Start Date <span>*</span></label>
							<div class="col-sm-6">
                            <input type="datetime-local" autocomplete="off" class="form-control" name="start" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">End Date <span>*</span></label>
							<div class="col-sm-6">
                            <input type="datetime-local" autocomplete="off" class="form-control" name="end" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Adult <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="adult" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Children <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="children" required>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Points <span>*</span></label>
							<div class="col-sm-6">
                            <input type="number" autocomplete="off" class="form-control" name="points" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Photo <span>*</span></label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="photo" required>(Only jpg, jpeg, gif and png are allowed)
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