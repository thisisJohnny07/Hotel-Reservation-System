<?php require_once('header.php'); ?>

<?php
$roomId = $_GET['id'];
if(!isset($roomId)) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM rooms WHERE id=?");
	$statement->execute(array($roomId));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
	// Getting other photo ID to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM images WHERE roomId=?");
	$statement->execute(array($roomId));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$photo = $row['image'];
		unlink('..assets/uploads/'.$photo);
	}

	// Delete from images
	$statement = $pdo->prepare("DELETE FROM images WHERE roomId=?");
	$statement->execute(array($roomId));

	// Delete from tbl_product_size
	$statement = $pdo->prepare("DELETE FROM roomAmenities WHERE roomId=?");
	$statement->execute(array($roomId));

	// Delete from tbl_product_color
	$statement = $pdo->prepare("DELETE FROM roomFeatures WHERE roomId=?");
	$statement->execute(array($roomId));

	// Delete from rooms
	$statement = $pdo->prepare("DELETE FROM rooms WHERE id=?");
	$statement->execute(array($roomId));

	header('location: room.php');
?>