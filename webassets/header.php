<?php
    include("admin/inc/config.php");
    include("admin/inc/functions.php");
    include("admin/inc/CSRF_Protect.php");
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEADER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        ul.head {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #fff;
            height: 80px; 
            display: flex; /* Added */
            justify-content: center; /* Added */
            align-items: center; /* Added */
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 20px 21px; /* Adjusted padding */
            text-decoration: none;
            font-size: 15px; /* Font size */
            font-weight: bold; /* Font weight */
            font-family: 'Inter', sans-serif; /* Font family */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        img {
            display: inline-block;
            vertical-align: top;
            width: 18%;
            height: auto;
            float: left;
            margin: 10px 8%;
        }

        @media screen and (max-width: 600px) {
            ul {
                flex-direction: column;
                height: auto; /* Remove fixed height */
            }

            li {
                text-align: center; /* Align items center horizontally */
            }

            img {
                margin: 10px auto; /* Center the logo */
            }
        }
    </style>
</head>
<body>
    <ul class="head">
        <a href="index.php"><img src="images/logo2.png" alt="logo"></a>
        <?php
		if(isset($_SESSION['member'])) {
            $fname = $_SESSION['member']['firstName'];
            $lname = $_SESSION['member']['lastName'];
		?>
            <li><a href="#"><span class="fa fa-user"></span> Logged in as <?php echo $fname . ' ' . $lname  ?></a></li>
            <li><a href="dashboard.php"><span class="fa fa-home"></span> Dashboard</a></li>
        <?php
			}
		?>
        <li><a href="login.php"><span class="fa fa-sign-in"></span> Sign In</a></li>
        <li><a href="registration.php"><span class="fa fa-user-plus"></span> Join Now</a></li>
    </ul>
</body>
</html>
