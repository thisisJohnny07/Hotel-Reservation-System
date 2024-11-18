<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservation History</title>
        <link rel="stylesheet" href="webassets/css/reservation.css">
    </head>
    <body style="margin: 0;">
        <!-- Header -->
        <?php require_once('webassets/header.php'); ?>
        <?php require_once('webassets/navbar.php'); ?>

        <div class="container">
            <h1>Reservation History</h1>
        </div>

        <div class="reservation-container">
            <table>
                <tr>
                    <th width="20%">Image</th>
                    <th>Room</th>
                    <th>Offer</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
                <?php
                    $userId = $_SESSION['member']['id'];
                    $statement = $pdo->prepare("SELECT * FROM reservations
                    INNER JOIN offers ON offers.id = reservations.offerId
                    INNER JOIN rooms ON rooms.id = offers.roomId
                    INNER JOIN (
                        SELECT roomId, MIN(image) AS first_image
                        FROM images
                        GROUP BY roomId
                    ) AS first_images ON rooms.id = first_images.roomId
                    WHERE reservations.memberId = :userId
                    AND reservations.status = 0");
                    $statement->execute([':userId' => $userId]);
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC); 

                    if (count($result) > 0) {
                        foreach ($result as $row) {            
                ?>
                    <tr>
                        <td><img src="<?php echo 'assets/uploads/' . $row['first_image']; ?>" alt="Room"></td>
                        <td><?php echo $row['roomName']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['checkIn']; ?></td>
                        <td><?php echo $row['checkOut']; ?></td>
                    </tr>
                <?php
                        }
                    } else {
                ?>
                    <tr>
                        <td colspan="5">There is no reservation history.</td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>

        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>

    </body>
</html>
