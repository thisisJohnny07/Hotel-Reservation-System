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
$error_message = '';
if(isset($_POST['login'])) {
        
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email and/or Password can not be empty.'.'<br>';
    } else {
        
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $statement = $pdo->prepare("SELECT * FROM members WHERE email=?");
        $statement->execute(array($email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $row_password = $row['password'];
        }

        if($total==0) {
            $error_message .= 'Email not registered'.'<br>';
        } else {
            //using MD5 form
            if( $row_password != md5($password) ) {
                $error_message .= 'Incorect Password'.'<br>';
            } else {
                $_SESSION['member'] = $row;
                header("location: ".BASE_URL."login.php");
            }
            
        }
    }
}
?>
        <!-- Body Container -->
        <div class="body-container" style="background-image: url(images/frontDesk.jpg);">
            <div class="container-login">
                <?php if (!empty($error_message)) : ?>
                    <p style="background-color:rgba(192, 192, 192, 0.5);padding: 3px;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form action="" method="post">
                    <div>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-color" value="Login" name="login">
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->

        <?php require_once('webassets/footer.php'); ?>