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
            $error_message = "";
            $userId = $_SESSION['member']['id'];
            $statement = $pdo->prepare("SELECT * FROM members WHERE id=:userId");
            $statement->execute(array(':userId' => $userId)); // Corrected the binding
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $oldPassword = $row['password'];
            }

            
            if(isset($_POST['update'])) {

                $valid = 1;

                // Hash the plaintext password
                $hashedPassword = md5($_POST['password']);

                // Compare hashed passwords
                if($hashedPassword != $oldPassword) {
                    $valid = 0;
                    $error_message .= "Old password is incorrect.\\n";
                }

                if($valid == 1) {
                    // If passwords match and other validation passed, update the password
                    $cust_new_password = strip_tags($_POST['password2']);
                    $hashedNewPassword = md5($cust_new_password);
                    $statement = $pdo->prepare("UPDATE members SET password=? WHERE id=?");
                    $statement->execute(array($hashedNewPassword, $userId));
                    
                    header('location: '.'update-password.php');
                }
            }
        ?>
        <div class="container">
            <h1>Update Password</h1>
        </div>
        <div class="reservation-container">
            <form action="" method="post">
                <div class="form-container">
                    <p><?php echo $error_message; ?></p>
                    <label for="psw"><b>Old Password</b></label>
                    <input type="password" name="password" id="psw" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" name="password2" id="psw" required>
                    <button type="submit" class="registerbtn" name="update">Update</button>
                </div>
            </form> 
        </div>
        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>

    </body>
</html>
