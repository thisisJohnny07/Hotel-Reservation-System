<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Congratulations Page Design By WebJourney - Html Template </title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="webassets/css/success.css">
</head>

    <body>
        <?php require_once('webassets/header.php'); ?>
        <?php require_once('webassets/navbar.php'); ?>
        <?php
            // Check if reservation ID is set
            if (!isset($_GET['id'])) {
                header('Location: index.php');
                exit;
            } else {
                $tempReservationId = $_GET['id'];
            }

            // Check if the reservation has already been confirmed in the current session
            if (isset($_SESSION['reservation_confirmed'][$tempReservationId]) && $_SESSION['reservation_confirmed'][$tempReservationId]) {
                header('Location: index.php');
                exit;
            }

            // Fetch reservation details
            $statement = $pdo->prepare("SELECT * FROM temporaryReservations WHERE id = ?");
            $statement->execute([$tempReservationId]);
            $reservation = $statement->fetch(PDO::FETCH_ASSOC);

            $memberId = $reservation['memberId'];
            $offerId = $reservation['offerId'];
            $checkIn = $reservation['checkIn'];
            $checkOut = $reservation['checkOut'];
            $accessibility = $reservation['accessibility'];
            $purpose = $reservation['purpose'];
            $arrival = $reservation['arrival'];
            $request = $reservation['specialRequest'];
            $numRooms = $reservation['numberOfRoom'];

            // Insert reservation into 'reservations' table
            $statement = $pdo->prepare("INSERT INTO reservations (memberId, offerId, checkIn, checkOut, accessibility, purpose, arrival, specialRequest, numberOfRoom) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute([$memberId, $offerId, $checkIn, $checkOut, $accessibility, $purpose, $arrival, $request, $numRooms]);

            // Fetch offer details
            $statement = $pdo->prepare("SELECT * FROM offers WHERE id = ?");
            $statement->execute([$offerId]);
            $offer = $statement->fetch(PDO::FETCH_ASSOC);
            $availableRoom = $offer['availableRoom'];

            // Update available room count
            $updatedAvailableroom = $availableRoom - $numRooms;
            $statement = $pdo->prepare("UPDATE offers SET availableRoom=? WHERE id=?");
            $statement->execute([$updatedAvailableroom, $offerId]);

            // Mark the reservation as confirmed in the session
            $_SESSION['reservation_confirmed'][$tempReservationId] = true;

        ?>


        <!-- Congratulations area start -->
        <div class="congratulation-area text-center mt-5">
            <div class="container">
                <div class="congratulation-wrapper">
                    <div class="congratulation-contents center-text">
                        <div class="congratulation-contents-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h4 class="congratulation-contents-title"> Congratulations! </h4>
                        <p class="congratulation-contents-para"> Your reservation has been confirmed, and we look forward to welcoming you to Shangri-La The Fort, Manila. Enjoy your stay! </p>
                        <div class="btn-wrapper mt-4">
                            <a id="dashboardBtn" href="reservations.php" class="cmn-btn btn-bg-1">Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Congratulations area end -->
        <?php require_once('webassets/footer.php'); ?>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get the "Go to dashboard" button element
        var dashboardBtn = document.getElementById('dashboardBtn');

        // Add an event listener to the button
        dashboardBtn.addEventListener('click', function() {
            // Remove the 'id' parameter from the URL
            history.replaceState({}, document.title, "successPage.php");
        });
    </script>

    </body>
</html>