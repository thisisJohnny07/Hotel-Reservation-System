<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="webassets/css/swiper-bundle.css">
    <link rel="stylesheet" href="webassets/css/style.css">
</head>
<body>
    <!-- Header -->
    <?php require_once('webassets/header.php'); ?>
    <?php require_once('webassets/navbar.php'); ?>

    <!-- slider -->
    <div class="slideshow-container">
        <?php
            $i=0;
            $statement = $pdo->prepare("SELECT * FROM sliders");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {            
        ?>
            <div class="mySlides fade">
                <img src="<?php echo 'assets/uploads/' . $row['photo']; ?>" style="width:100%">
                <h1 class="slider-heading"><?php echo $row['heading']; ?></h1>
                <p class="slider-content"><?php echo $row['content']; ?></p>
                <a href="<?php echo $row['buttonUrl']; ?>"><button class="slider-btn"><?php echo $row['buttonText']; ?></button></a>
            </div>
        <?php
            $i++;
        }
        ?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            <!-- Dot indicators placed inside the slideshow container -->
            <div style="text-align:center; position: absolute; bottom: 8px; width: 100%;">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </div>
   
    <!-- Search Container -->
    <?php require_once('webassets/search.php'); ?>

    <!-- Content COntainer -->
	<div class="content-container">
		<h1 class="title">A World of Rewards and Privileges Awaits</h1>
		<p class="description">Whether you’re here for a bite or a string of nights, join as a member to enjoy exclusive benefits and a seamless digital experience.</p>
		<button class="btn-join"><a class="join" href="registration.php">Join Now</a></button>
		<a class="btn-sign-in" href="login.php">Already a member? Sign in here.</a>
		<div class="services-container">
            <?php
                $i=0;
                $statement = $pdo->prepare("SELECT * FROM services");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {            
			    echo '<img src="assets/uploads/' . $row['photo'] . '"alt="service">';
                $i++;
            }
            ?>
		</div>
	</div>

    <!-- Image Slider -->
    <div class="content-container">
        <h1 class="title">Recommended Room Types</h1>
        <div class="card-container">
            <div class="arrow-container">
                <P class="instruction swiper-button-prev"><i class="fa fa-angle-left"></i></P>
                <P class="instruction swiper-button-next"><i class="fa fa-angle-right"></i></P>
            </div>
            <div class="card__container swiper">
                <div class="card__content">
                    <div class="swiper-wrapper">
                        <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM rooms
                            INNER JOIN images ON rooms.id = images.roomId
                            GROUP BY roomId");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                            foreach ($result as $row) {            
                        ?>
                        <article class="card__article swiper-slide">
                            <div class="card__image">
                                <img src="<?php echo 'assets/uploads/' . $row['image']; ?>" alt="image" class="card__img">
                            </div>
            
                            <div class="card__data">
                                <div class="description-container">
                                    <h3 class="card__name"><?php echo $row['roomName']; ?></h3>
                                    <?php
                                        $description = $row['description'];
                                        $words = explode(' ', $description); // Split description into an array of words
                                        if (count($words) > 20) {
                                            $words = array_slice($words, 0, 20); // Take only the first 10 words
                                            $description = implode(' ', $words) . '...'; // Join the words back together with an ellipsis
                                        }
                                    ?>
                                    <p class="card__description"><?php echo $description; ?></p>
                                </div>
                                <div class="btn-container">
                                    <a href="room.php?id=<?php echo $row['roomId']; ?>" class="card__button">Learn More</a>
                                </div>
                            </div>
                        </article>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    
    <!-- Offer Slider -->
    <div id="1" class="content-container">
        <h1 class="title">Offers</h1>
        <div class="card-container">
            <div class="arrow-container">
                <P class="instruction swiper-button-prev"><i class="fa fa-angle-left"></i></P>
                <P class="instruction swiper-button-next"><i class="fa fa-angle-right"></i></P>
            </div>
            <div class="card__container swiper">
                <div class="card__content">
                    <div class="swiper-wrapper">
                        <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM offers");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                            foreach ($result as $row) {            
                        ?>
                        <article class="card__article swiper-slide">
                            <div class="card__image">
                                <img src="<?php echo 'assets/uploads/' . $row['photo'];  ?>" alt="image" class="card__img">
                            </div>
            
                            <div class="card__data">
                                <div class="title-container">
                                    <h4>Rooms & Suites</h4>
                                    <h3 class="card__name"><?php echo $row['title'] ?></h3>
                                </div>
                                <div class="detail-container">
                                    <p>From PHP <?php echo $row['rate'] ?> Average Per Night</p>
                                    <a href="booking.php?id=<?php echo $row['id'] ?>" class="card__button">Book Now</a>
                                </div>
                            </div>
                        </article>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Map Container -->
    <div class="content-container">
        <h1 class="title">Find Us On Map</h1>
        <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15447.266152545866!2d121.0468063!3d14.5524816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8f0efdc1869%3A0x55d745f5355cb907!2sShangri-La%20The%20Fort%2C%20Manila!5e0!3m2!1sen!2sph!4v1712674967110!5m2!1sen!2sph" width="100%" height="400" style="border:0; border-radius: 7px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    <!-- Footer -->
    <?php require_once('webassets/footer.php'); ?>

    <!--=============== SWIPER JS ===============-->
    <script src="webassets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="webassets/js/main.js"></script>
    
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Function to move to the next slide automatically every 5 seconds
        function autoSlide() {
            plusSlides(1);
        }

        // Set interval to call autoSlide function every 5 seconds
        let slideInterval = setInterval(autoSlide, 8000);

        // Function to pause the auto sliding when the user interacts with the slideshow
        function pauseAutoSlide() {
            clearInterval(slideInterval);
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
    </script>
</body>
</html>
