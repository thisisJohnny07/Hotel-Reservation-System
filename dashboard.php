<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="webassets/css/room.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="webassets/css/dashboard.css">
    </head>
    <body style="margin: 0;">
        <!-- Header -->
        <?php require_once('webassets/header.php'); ?>
        <?php require_once('webassets/navbar.php'); ?>
        <div class="container">
            <h1>Welcome to the Dashboard</h1>
        </div>
        <div class="buttons-container">
            <a href="update-profile.php"><button class="d-btn">Update Profile</button></a>
            <a href="update-password.php"><button class="d-btn">Update Password</button></a>
            <a href="Reservations.php"><button class="d-btn">Reservations</button></a>
            <a href="reservation-history.php"><button class="d-btn">Reservations History</button></a>
            <a href="logout.php"><button class="d-btn">Logout</button></a>
        </div>

        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>

    </body>
</html>
