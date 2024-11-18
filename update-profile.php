<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Password</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
        <link rel="stylesheet" href="webassets/css/reservation.css">
    </head>
    <body style="margin: 0;">
        <!-- Header -->
        <?php require_once('webassets/header.php'); ?>
        <?php require_once('webassets/navbar.php'); ?>

        <?php 
            $userId = $_SESSION['member']['id'];
            
            if(isset($_POST['update'])) {

                $statement = $pdo->prepare("UPDATE members SET firstName=?, lastName=?, email=?, phone=? WHERE id=?");
                $statement->execute(array($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $userId));
                    
                header('location: '.'update-profile.php');
            }
        ?>
        <div class="container">
            <h1>Update Profile</h1>
        </div>
        <div class="reservation-container">
            <form action="" method="post">
                <div class="form-container">

                    <label for="firstName"><b>First Name</b></label>
                    <input type="text" name="firstName" required>

                    <label for="lastName"><b>Last Name</b></label>
                    <input type="text" name="lastName" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" required>

                    <label for="phone"><b>Phone</b></label>
                    <input type="number" name="phone" required>

                    <button type="submit" class="registerbtn" name="update">Update</button>
                </div>
            </form> 
        </div>

        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>

    </body>
</html>
