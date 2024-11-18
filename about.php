<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

</head>
<style>
    body {
        margin: 0;
    }
    .hotel-banner{
    font-size: 1rem;
    font-family: PlayfairDisplay, Georgia, Times New Roman, serif;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}


.container-about {
    position: relative;
    width: 100%;
    height: 80vh;
    display: flex;

    background-size: cover;
    background-position: center;
}
.container-about1{
    padding: 0% 10% 0 10%;
}

.container-about1 p{
    font-size: 20px;
    line-height: 30px;
    font-family: Arial, Helvetica, sans-serif;
}


.container-services{
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
 
}

.about-image{
    flex: 1;
    
    
}

.about-image img{
  width: 600px;
  height: 400px;
}

.about-services .learn-more{
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 1em;
    color: #d48806;
    border: 2px solid #d48806;
    background-color: transparent;
    cursor: pointer;
    text-transform: uppercase;
    transition: all 0.3s ease;
}
.about-services{
   padding-left: 70px; 
   padding-right: 20px;
}
.container-services p{
    font-family: Arial, Helvetica, sans-serif;
    line-height: 30px;
}
</style>
<body>
           <!-- Header -->
           <?php require_once('webassets/header.php'); ?>
        
           <?php require_once('webassets/navbar.php'); ?>

    <div class="container-about">
        <img src="images/about12.jpg" style="width: 100% ; height: 70vh;">
        <div class="hotel-banner">
            <h1>Your Shangri-la Story</h1>
        </div>
    </div>

    <div class="container-about1">
        <div class="about-text">
            <h1 style="text-align: center;">Dynamic Luxury</h1>
            <h2 style="text-align: center;"> where the city comes alive</h2>
          
            <p style="text-align: center;">
                Shangri-La The Fort, Manila is a mixed-use development in the heart of Bonifacio Global City, a vibrant contemporary lifestyle district at the centre of Metro Manila. Standing at 250 metres high, the property is a LEED gold-certified green development, committed to achieving and maintaining the highest standards of sustainable design. Its lifestyle hubs reshape living, dining and shopping experiences, making it a truly dynamic destination.
            </p>
        </div>
    </div>

    <div class="container-services">
        <div class="about-services">
            <h2>Services & Facilities</h2>
            <p>For business or leisure, our dedicated and experienced staff cater to the needs of guests through an extensive range of facilities and services. If you require any service not listed here, please contact us and we will try to assist in any way we can. Facilities ...</p>
            </div>  
            <div class="about-image">
                <img src="images/services and facilities.jpg" alt="Conference Room"> <!-- Replace with the path to your image -->
            </div>
    </div>

    <div class="container-services">
        <div class="about-image">
            <img src="images/exploremanila.png" alt="Manila">
        </div>
        <div class="about-services">
            <h2>Explore Manila</h2>
            <p>Metro Manila is a dynamic metropolis and home to Bonifacio Global City (BGC) in Taguig, where Shangri-La The Fort, Manila is located. BGC thrives as a vibrant urban district with its colourful mix of offices, residences, schools, cultural areas, restaurants, shops and wellness... </p>
        </div>
    </div>

    <div class="container-services">
        <div class="about-services">
            <h2>Awards</h2>
            <p>We've been honoured to receive worldwide recognition for our legendary Asian hospitality. Here is a list of our recent awards: 2024 Traveller Review Award, Booking.com, Shangri-La Residences The Fort, 2024 Traveller Review Award, Booking.com, Shangri-La The Fort, Manila... </p>
            </div>  
            <div class="about-image">
                <img src="images/awards.jpg" alt="Conference Room"> <!-- Replace with the path to your image -->
            </div>
    </div>

    <div class="container-services">
        <div class="about-image">
            <img src="images/corporate.jpg" alt="Manila">
        </div>
        <div class="about-services">
            <h2>Corporate Social Responsibility</h2>
            <p>At Shangri-La The Fort, Manila, we express our corporate social responsibility initiatives through caring for our communities and the environment. We contribute and focus on community engagement, environment and biodiversity, employee development, sustainable... </p>
        </div>
    </div>

    <div class="container-services">
        <div class="about-services">
            <h2>Map & Directions</h2>
            <p>Shangri-La The Fort, Manila is within easy reach of Ninoy Aquino International Airport. Guests can choose between a hotel limousine pick-up, taxi, or car rental.   Click here to view the nearby attractions.</p>
            </div>  
            <div class="about-image">
                <img src="images/map.jpg" alt="Conference Room"> <!-- Replace with the path to your image -->
            </div>
    </div>

            <?php require_once('webassets/footer.php'); ?>
</body>
</html>