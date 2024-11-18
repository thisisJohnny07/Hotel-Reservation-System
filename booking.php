<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="webassets/css/booking.css">
    <title>Login Page</title>
    <script>
        function updateTotalCharges() {
            const rate = parseFloat(document.getElementById('roomRate').dataset.rate);
            const numRooms = parseInt(document.getElementById('numRooms').value, 10);
            const serviceChargeAndTax = 3524.65;
            const memberDiscount = 800;
            const roomCharges = rate * numRooms;
            const totalCharges = roomCharges + serviceChargeAndTax - memberDiscount;

            document.getElementById('roomCharges').innerText = 'PHP ' + roomCharges.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            document.getElementById('totalCharges').innerText = 'PHP ' + totalCharges.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            document.querySelector('input[name="totalCharges"]').value = totalCharges.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('numRooms').addEventListener('input', updateTotalCharges);
        });
    </script>
</head>
<body>
    <!-- Header -->
    <?php require_once('webassets/header.php'); ?>

    <?php
        if (!isset($_SESSION['member'])) {
            header('Location: login.php');
            exit;
        } else {
            $userId = $_SESSION['member']['id'];
            $offerId = $_GET['id'];
        }
    ?>

    <!-- Search Container -->
    <?php require_once('webassets/search.php'); ?>

    <div class="column-container">
        <h3 class="title">Rate Summary: Shangri-La The Fort, Manila</h3>
        <div class="row-container">
            <?php
                $statement = $pdo->prepare("SELECT * FROM offers
                                            INNER JOIN rooms ON rooms.id = offers.roomId
                                            INNER JOIN images ON rooms.id = images.roomId
                                            WHERE offers.id = :offerId
                                            GROUP BY rooms.id");
                $statement->execute(['offerId' => $offerId]);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            
                foreach ($result as $row):
            ?>
            <div class="img-container">
                <div class="image-container">
                    <img class="bed" src="<?= 'assets/uploads/' . htmlspecialchars($row['image']); ?>" style="width:100%" alt="Room Image">
                </div>
            </div>
            <div class="details-container">
                <p><b>Rate Name:</b> <?= htmlspecialchars($row['title']); ?></p>
                <p><b>Room Type:</b> <?= htmlspecialchars($row['roomName']); ?></p>
                <p><b>Points:</b> <?= htmlspecialchars($row['points']); ?></p>
                <p><b>Guests:</b> <?= 'Adult: ' . htmlspecialchars($row['adult']) . ", Kids: " . htmlspecialchars($row['children']); ?></p>
                <p><b>Rate:</b> PHP <span id="roomRate" data-rate="<?= htmlspecialchars($row['rate']); ?>"><?= number_format($row['rate'], 2, '.', ','); ?></span></p>
            </div>
            <?php
                $startDate = new DateTime($row['start']);
                $endDate = new DateTime($row['end']);

                $start = $startDate->format('Y-m-d');
                $end = $endDate->format('Y-m-d');

                $offerName = $row['title'];
                $availableRoom = $row['availableRoom'];
                endforeach;
            ?>
        </div>
    </div>
    <div class="row-container">
        <div class="guest-container">
            <h1>Guest Information</h1>
            <p class="instruction">The information that hotel personnel will use to get in touch with you is listed below.</p>
            <hr>
            <div class="information-container">
                <?php
                    $statement = $pdo->prepare("SELECT * FROM members WHERE id = :userId");
                    $statement->execute(['userId' => $userId]);
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                
                    foreach ($result as $row):
                ?>
                    <p class="information"><span class="fa fa-user"></span>&nbsp;&nbsp;<?= htmlspecialchars($row['firstName'] . " " . $row['lastName']); ?></p>
                    <p class="information"><span class="fa fa-envelope"></span>&nbsp;&nbsp;<?= htmlspecialchars($row['email']); ?></p>
                    <p class="information"><span class="fa fa-phone"></span>&nbsp;&nbsp;<?= htmlspecialchars($row['phone']); ?></p>
                <?php endforeach; ?>
            </div>
            <h1>Stay Information Forms</h1>
            <p class="instruction">Please let us know if you have any additional requests. You may add them any time by managing your booking online or by contacting us.</p>
            <hr>
            <form class="book" action="paybooking.php" method="POST">
                <h3>Room Preferences</h3>
                <div class="container">
                    <label class="book" for="checkIn"><b>Check In</b></label>
                    <input type="date" name="checkIn" min="<?= htmlspecialchars($start); ?>" max="<?= htmlspecialchars($end); ?>" required>
                    
                    <label class="book" for="numRooms"><b>Number of Rooms (<?php echo $availableRoom ?> available room/s)</b></label>
                    <input type="number" id="numRooms" name="numRooms" value="1" min="1" max="<?php echo $availableRoom ?>" required>


                    <label class="book" for="accessibility"><b>Smoking or a non-smoking room?</b></label>
                    <p>This is a non-smoking hotel</p>

                    <label class="book" for="accessibility"><b>Please let us know if you would prefer an accessible guest room.</b></label>
                    <select name="accessibility">
                        <option value="">--Select Option--</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>

                    <label class="book" for="purpose"><b>Please let us know the purpose of your stay.</b></label>
                    <select name="purpose">
                        <option value="">--Select Purpose--</option>
                        <option value="Business Travel">Business Travel</option>
                        <option value="Weddings & Celebrations">Weddings & Celebrations</option>
                        <option value="Meetings & Events">Meetings & Events</option>
                        <option value="Leisure">Leisure</option>
                        <option value="Family">Family</option>
                    </select>

                    <label class="book" for="arrival"><b>Estimated Time of Arrival</b></label>
                    <p>If your arrival time is before the standard check-in time, we will do our best to accommodate you.</p>
                    <input type="time" name="arrival">

                    <label class="book" for="request"><b>Special Request</b></label>
                    <p>Please let us know of any additional requests to help us ensure you have a comfortable stay.</p>
                    <textarea name="request" cols="20" rows="10"></textarea>
                </div>
            </div>
            <div class="charges-container">
                <div class="charges-information-container">
                    <h2>Charges</h2>
                    <table>
                        <?php
                            $statement = $pdo->prepare("SELECT * FROM offers WHERE id = :offerId");
                            $statement->execute(['offerId' => $offerId]);
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);               
                            foreach ($result as $row):
                        ?>
                            <tr>
                                <td><p class="information"><b>Room Charges</b></p></td>
                                <td><p><span id="roomCharges" data-rate="<?= htmlspecialchars($row['rate']); ?>"><?= number_format($row['rate'], 2, '.', ','); ?></span></p></td>
                            </tr>
                            <tr>
                                <td><p class="information"><b>Service Charge and Tax</b></p></td>
                                <td><p>PHP 3,524.65</p></td>
                            </tr>
                            <tr style="color: red">
                                <td><p class="information"><b>Member Discount</b></p></td>
                                <td><p>- PHP 800.00</p></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <hr>
                    <table>
                        <tr>
                            <td><h4>Total Charges</h4></td>
                            <td><p><b id="totalCharges">
                                <?php
                                    $totalCharges = $row['rate'] + 3524.65 - 800;
                                    echo 'PHP ' . number_format($totalCharges, 2, '.', ',');
                                ?>
                            </b></p></td>
                        </tr>
                    </table>

                    <input type="hidden" name="offerId" value="<?= htmlspecialchars($offerId); ?>"/>
                    <input type="hidden" name="totalCharges" value="<?= htmlspecialchars($totalCharges); ?>"/>
                    <input type="hidden" name="userId" value="<?= htmlspecialchars($userId); ?>"/>
                    <input type="hidden" name="offerName" value="<?= htmlspecialchars($offerName); ?>"/>
                    <input type="hidden" name="checkOut" value="<?= htmlspecialchars(date('Y-m-d', strtotime($checkIn . ' +1 day'))); ?>">

                    <button type="submit" class="registerbtn" name="pay_booking">Pay Booking</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once('webassets/footer.php'); ?>
</body>
</html>
