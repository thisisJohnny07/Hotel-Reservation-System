<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="webassets/css/style.css">
</head>

<!-- Header -->
<?php
    require_once('webassets/header.php');
?>

<?php
    if (isset($_POST['register'])) {
        $message = "";

        $valid = 1;
    
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $message = "invalid email"."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM members WHERE email=?");
            $statement->execute(array($_POST['email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $message .= "Email already taken"."<br>";
            }
        }
    
        if($_POST['password1'] != $_POST['password2']) {
            $valid = 0;
            $message .= "Passwords do not match"."<br>";
        }
    
        if($valid == 1) {
    
            // saving into the database
            $statement = $pdo->prepare("INSERT INTO members (firstName, lastName, email, phone, password) VALUES (?,?,?,?,?)");
            $statement->execute(array(strip_tags($_POST['firstName']), strip_tags($_POST['lastName']), strip_tags($_POST['email']), strip_tags($_POST['phoneNumber']), md5($_POST['password2'])));
    
            unset($_POST['firstName']);
            unset($_POST['lastName']);
            unset($_POST['email']);
            unset($_POST['phoneNumber']);
            unset($_POST['password1']);
            unset($_POST['password2']);
    
            $message = "Successfully Registered";
        }
    }
?>
        <!-- Body Container -->
        <div class="body-container" style="background-image: url(images/frontDesk.jpg);">
            <div class="container-reg"> 
                <?php if (!empty($message)) : ?>
                    <p style="background-color:rgba(192, 192, 192, 0.5);padding: 3px;"><?php echo $message; ?></p>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="input-row">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                    </div>
                    <div class="input-row">
                        <input type="email" class="form-control" name="email" placeholder="Email" maxlength="50" required>
                        <input type="number" class="form-control" name="phoneNumber" placeholder="Phone Number" required   >
                    </div>
                    <div class="input-row">
                        <input type="password" class="form-control" name="password1" placeholder="Password" maxlength="8" required>
                        <input type="password" class="form-control" name="password2" placeholder="Retype Password" maxlength="8" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-color" value="Register" name="register">
                    </div>
            </form>
        </div>

        </div>

        <!-- Footer -->

        <?php
    require_once('webassets/footer.php');
    ?>