<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['facebook'],'Facebook'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['twitter'],'Twitter'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['linkedin'],'LinkedIn'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['googleplus'],'Google Plus'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['pinterest'],'Pinterest'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['youtube'],'YouTube'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['instagram'],'Instagram'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['tumblr'],'Tumblr'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['flickr'],'Flickr'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['reddit'],'Reddit'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['snapchat'],'Snapchat'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['whatsapp'],'WhatsApp'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['quora'],'Quora'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['stumbleupon'],'StumbleUpon'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['delicious'],'Delicious'));

	$statement = $pdo->prepare("UPDATE socials SET socialUrl=? WHERE socialName=?");
	$statement->execute(array($_POST['digg'],'Digg'));

	$success_message = 'Social Media URLs are updated successfully.';

}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Social Media</h1>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM socials");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	if($row['socialName'] == 'Facebook') {
		$facebook = $row['socialUrl'];
	}
	if($row['socialName'] == 'Twitter') {
		$twitter = $row['socialUrl'];
	}
	if($row['socialName'] == 'LinkedIn') {
		$linkedin = $row['socialUrl'];
	}
	if($row['socialName'] == 'Google Plus') {
		$googleplus = $row['socialUrl'];
	}
	if($row['socialName'] == 'Pinterest') {
		$pinterest = $row['socialUrl'];
	}
	if($row['socialName'] == 'YouTube') {
		$youtube = $row['socialUrl'];
	}
	if($row['socialName'] == 'Instagram') {
		$instagram = $row['socialUrl'];
	}
	if($row['socialName'] == 'Tumblr') {
		$tumblr = $row['socialUrl'];
	}
	if($row['socialName'] == 'Flickr') {
		$flickr = $row['socialUrl'];
	}
	if($row['socialName'] == 'Reddit') {
		$reddit = $row['socialUrl'];
	}
	if($row['socialName'] == 'Snapchat') {
		$snapchat = $row['socialUrl'];
	}
	if($row['socialName'] == 'WhatsApp') {
		$whatsapp = $row['socialUrl'];
	}
	if($row['socialName'] == 'Quora') {
		$quora = $row['socialUrl'];
	}
	if($row['socialName'] == 'StumbleUpon') {
		$stumbleupon = $row['socialUrl'];
	}
	if($row['socialName'] == 'Delicious') {
		$delicious = $row['socialUrl'];
	}
	if($row['socialName'] == 'Digg') {
		$digg = $row['socialUrl'];
	}
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
			
			<form class="form-horizontal" action="" method="post">
				<div class="box box-info">
					<div class="box-body">						
						<p style="padding-bottom: 20px;">If you do not want to show a social media in your front end page, just leave the input field blank.</p>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facebook </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="facebook" value="<?php echo $facebook; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="twitter" value="<?php echo $twitter; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">LinkedIn </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="linkedin" value="<?php echo $linkedin; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Google Plus </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="googleplus" value="<?php echo $googleplus; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Pinterest </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="pinterest" value="<?php echo $pinterest; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">YouTube </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="youtube" value="<?php echo $youtube; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="instagram" value="<?php echo $instagram; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Tumblr </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="tumblr" value="<?php echo $tumblr; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Flickr </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="flickr" value="<?php echo $flickr; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Reddit </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="reddit" value="<?php echo $reddit; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Snapchat </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="snapchat" value="<?php echo $snapchat; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">WhatsApp </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="whatsapp" value="<?php echo $whatsapp; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Quora </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="quora" value="<?php echo $quora; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">StumbleUpon </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="stumbleupon" value="<?php echo $stumbleupon; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Delicious </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="delicious" value="<?php echo $delicious; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Digg </label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="digg" value="<?php echo $digg; ?>">
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