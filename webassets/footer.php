<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTER</title>
    <style>
        .column {
            width: calc(70% / 3);
            padding: 0 30px;
            box-sizing: border-box;
            text-align: left; /* Center text horizontally within the column */
        }

        .columns-container-1 {
            display: flex;
            justify-content: center;
            align-items: top;
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 40px;
        }

        .columns-container-2 {
            display: flex;
            justify-content: center;
            align-items: top;
            background-color: white;
            color: white;
            padding: 10px;
        }

        .columns-container-3 {
            display: flex;
            justify-content: center;
            align-items: top;
            background-color: #B49852;
            color: white;
            padding: 20px;
        }

        /* Reset margin for h4 and p elements */
        .column h4 {
            margin: 0 0 10px 0;
        }

        .column p {
            font-size: 14px;
            margin: 0 0 5px 0;
        }

        img.brands {
            width: 40%;
        }

        img.cards {
            width: 80%;
            margin: 3px 0 0 0;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }

            .columns-container-1 {
                flex-direction: column;
            }
        }

        a.footer {
            text-decoration: none;
            color: white;
        }
    </style> 
</head>
<body>
    <div class="columns-container-1">
        <div class="column">
            <h4>Shangri-La The Fort, Manila</h4>
            <p><b>Address:</b> 30th Street corner 5th Avenue, Bonifacio Global City, Taguig City, Philippines</p>
            <p><b>Phone:</b> (63 2) 8820 0888</p>
            <p><b>E-mail:</b> manilafort@shangri-la.com</p>
        </div>
        <div class="column">
            <h4>Check-in / Check-out</h4>
            <p>We hope you’ve enjoyed your stay from start to finish.</p>
            <p>Please note the check-in / out times below:
                <br>Check-in: 2pm
                <br>Check-out: 12pm</p>
        </div>
        <div class="column">
            <h4>Payment Methods</h4>
            <p>Payment methods we accept:</p>
            <img class="cards" src="images/image-3.png" alt="cards">
        </div>
    </div>

    <div class="columns-container-2">
        <img class="brands" src="images/image-4.png" alt="logos">
    </div>

    <div class="columns-container-3">
        <p><a class="footer" href="privacypolicy.php">Privacy Policy</a> | <a class="footer" href="termsandcondition.php">Terms & Conditions</a> | Disclaimer | <a class="footer" href="codeofconduct.php"> Supplier Code Of Conduct</a></p>
    </div>
</body>
</html>
