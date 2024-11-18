<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="webassets/css/style.css">
</head>

<?php
    // Check if the required parameters are set
    if (isset($_POST['checkIn']) && isset($_POST['checkOut']) && isset($_POST['adult']) && isset($_POST['kids'])) {
        // Retrieve the values
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $adult = $_POST['adult'];
        $kids = $_POST['kids'];

        $checkIn = date('Y-m-d', strtotime($checkIn));
        $checkOut = date('Y-m-d', strtotime($checkOut));
    }
?>
 
        <!-- Header -->
        <?php require_once('webassets/header.php'); ?>
        
        <!-- Search Container -->
        <?php require_once('webassets/search.php'); ?>

        <div class="row-container" style="margin-bottom: 0px;">
            <div class="room-info-container">
                <h4 class="title">Room Type</h4>
            </div>
            <div style="margin-bottom= 0;" class="table-container">
                <table>
                    <tr>
                        <th style="width: 50%;">Rate Plan</th>
                        <th style="width: 30%;">Average per night</th>
                        <th style="width: 20%;"></th>
                    </tr>
                </table>
            </div>
        </div>
        <?php
            if(!isset($_REQUEST['id'])) {
            $i=0;
            $statement = $pdo->prepare("SELECT * FROM rooms
                INNER JOIN images ON rooms.id = images.roomId
                WHERE rooms.id IN (
                    SELECT roomId FROM offers
                    WHERE DATE(start) <= '$checkIn' AND DATE(end) >= '$checkOut' AND adult >= $adult AND children >= $kids  AND offers.availableRoom > 0)
                GROUP BY rooms.id");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    
            foreach ($result as $row) {            
        ?>
        <div class="row-container" style="margin-bottom: 30px;">
            <div class="room-info-container">
                <img class="bed-image" src="<?php echo 'assets/uploads/' . $row['image']; ?>" alt="bed">
                <h2 class="title"><?php echo $row['roomName'] ?></h2>
                <p class="description"><?php echo $row['titleHeader'] ?></p>
            </div>
            <div class="table-container">
                <table>
                    <?php
                        $currentRoom = $row['roomId'];
                        $i=0;
                        $statement = $pdo->prepare("SELECT offers.* FROM offers
                            INNER JOIN rooms ON rooms.id = offers.roomId
                            WHERE rooms.id = $currentRoom AND offers.availableRoom > 0
                            AND DATE(start) <= '$checkIn' AND DATE(end) >= '$checkOut' AND adult >= $adult AND children >= $kids");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            
                        foreach ($result as $row) {            
                    ?>
                        <tr>
                            <td style="width: 50%;"><?php echo $row['title'] ?></td>
                            <td style="width: 30%;"><?php echo 'PHP ' . number_format($row['rate'], 0, '.', ',') . '.00' ?></td>
                            <td style="width: 20%;"><button class="btn-book"><a class="book" href="booking.php?id=<?php echo $row['id'] ?>">Book Now</a></button></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
            $i++;
            }
        } else {
            $roomId = $_REQUEST['id'];
            $i=0;
            $statement = $pdo->prepare("SELECT * FROM rooms
            INNER JOIN images ON rooms.id = images.roomId
            WHERE rooms.id = $roomId
            GROUP BY roomId");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {     
            
        ?>
            <div class="row-container" style="margin-bottom: 30px;">
                <div class="room-info-container">
                    <img class="bed-image" src="<?php echo 'assets/uploads/' . $row['image']; ?>" alt="bed">
                    <h1 class="title"><?php echo $row['roomName'] ?></h1>
                    <p class="description"><?php echo $row['titleHeader'] ?></p>
                </div>
                <div class="table-container">
                    <table>
                        <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT offers.* FROM offers
                            INNER JOIN rooms ON rooms.id = offers.roomId
                            WHERE rooms.id = $roomId AND offers.availableRoom > 0");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                            foreach ($result as $row) {            
                        ?>
                            <tr>
                                <td style="width: 50%;"><?php echo $row['title'] ?></td>
                                <td style="width: 30%;"><?php echo 'PHP ' . number_format($row['rate'], 0, '.', ',') . '.00' ?></td>
                                <td style="width: 20%;"><button class="btn-book"><a class="book" href="booking.php?id=<?php echo $row['id'] ?>">Book Now</a></button></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        <?php
            $i++;
            }
        }
        ?>

        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>