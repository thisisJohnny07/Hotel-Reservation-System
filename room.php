<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="webassets/css/room.css">
    </head>

    <body style="margin: 0;">
        <!-- Header -->
        <?php require_once('webassets/header.php'); ?>
        <?php require_once('webassets/navbar.php'); ?>

        <?php

            $roomId = $_GET['id'];

            $statement = $pdo->prepare("SELECT * FROM rooms WHERE id = $roomId");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
            foreach ($result as $room) {
                $roomName = $room['roomName'];
                $titleHeader = $room['titleHeader'];
                $description = $room['description'];
                $childrenMealPlan = $room['childrenMealPlan'];
                $camera360 = $room['camera360'];
            }
        ?>
        <!-- Active Images Container -->
        <div class="images-container">
            <?php
                $i=0;
                $statement = $pdo->prepare("SELECT * FROM images WHERE roomId = $roomId");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) { 
            ?>
                <div class="img-container fade">
                    <img class="active" src="<?php echo 'assets/uploads/' . $row['image']; ?>" style="width:100%">
                </div>
            <?php
                $i++;
            }
            ?>
        </div>
        <!-- Images Container -->
        <div class="images-list-container">
            <div class="row">
                <?php 
                    $i=1;
                    foreach ($result as $row) {
                ?>
                <div class="image-container">
                    <img class="bed" src="<?php echo 'assets/uploads/' . $row['image']; ?>" style="width:100%" onclick="currentSlide(<?php echo $i; ?>)" alt="Cinque Terre">
                </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>

        <!-- Info Container -->
        <div class="info-container">
            <h1 class="title"><?php echo $roomName . ' Room'; ?></h1>
            <h3 class="header"><?php echo $titleHeader; ?></h3>
            <p class="description"><?php echo $description; ?></p>
            <a class="book" href="rates.php?id=<?php echo $roomId; ?>"><button class="btn-book">Book Now</button></a>
        </div>

        <!-- 360Camera and Self Nav Container -->
        <div class="row-container-360">
            <div class="camera360-container">
                <div class="container unique-container">
                    <div class="room-360">
                        <iframe frameborder="0" src="<?php echo $camera360; ?>" id="mainIframe"></iframe> 
                    </div>
                </div>
            </div>
            <div class="selfNav-container">
                <div class="tabs">
                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab1" checked>
                    <label for="tab1" class="tabs__label">Features</label>
                    <div class="tabs__content">
                        <ul type="disc">
                            <?php
                                $i=0;
                                $statement = $pdo->prepare("SELECT * FROM roomFeatures 
                                INNER JOIN features ON roomFeatures.featureId = features.id
                                WHERE roomId = $roomId");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                foreach ($result as $feature) { 
                                echo '<li>' . $feature['featureName'] . '</li>';
                                $i++;
                            }
                            ?>
                        </ul>
                    </div>
                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab2">
                    <label for="tab2" class="tabs__label">Amenities</label>
                    <div class="tabs__content">
                        <dl>
                            <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM roomAmenities 
                                                        INNER JOIN amenities ON roomAmenities.amenitiesId = amenities.id
                                                        INNER JOIN amenitiesCategories ON amenitiesCategories.id = amenities.categoryId
                                                        WHERE roomId = $roomId");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            // Group amenities by category
                            $groupedAmenities = [];
                            foreach ($result as $amenity) {
                                $category = $amenity['category'];
                                $groupedAmenities[$category][] = $amenity['description'];
                            }
                            // Output amenities by category
                            foreach ($groupedAmenities as $category => $amenities) {
                                echo "<dt><b>$category</b></dt>";
                                echo "<dd>";
                                echo "<ul type='disc'>";
                                foreach ($amenities as $amenity) {
                                    echo "<li>$amenity</li>";
                                }
                                echo "</ul>";
                                echo "</dd>";
                                $i++;
                            }
                            ?>
                        </dl>

                    </div>
                    <input type="radio" class="tabs__radio" name="tabs-example" id="tab3">
                    <label for="tab3" class="tabs__label">Children's meal plan</label>
                    <div class="tabs__content">
                        <p class="meal-plan"><?php echo $childrenMealPlan; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php require_once('webassets/footer.php'); ?>

        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("img-container");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex-1].style.display = "flex";
            }
        </script>
    </body>
</html>
