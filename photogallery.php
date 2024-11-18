<!DOCTYPE html>
<html>
  <head>
  <style>
      body {
        margin: 0;
      }
      .container-gallery{
        padding: 40px;
        display: flex; /* Add display flex to make each container-gallery one row */
        justify-content: center; /* Center align the items horizontally */
        flex-wrap: wrap; /* Allow items to wrap to the next row */
      }
      div.gallery img {
        width: 96%;
      }
      div.desc {
        text-align: left;
        padding-top: 10px;
        font-family: Montserrat, Verdana, Helvetica, Arial, sans-serif;
        margin-left: 30px;
      }
      * {
        box-sizing: border-box;
      }
      .responsive {
        padding: 0 6px;
        width: 33.33333%;
      }
      @media only screen and (max-width: 700px) {
        .responsive {
          width: 49.99999%;
          margin: 6px 0;
        }
        .container-gallery {
          flex-direction: column; /* Change flex direction to column for smaller screens */
          align-items: center; /* Center align items vertically */
        }
      }
      @media only screen and (max-width: 500px) {
        .responsive {
          width: 100%;
        }
      }
      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }
      .gallery-title{
        padding-top: 50px;
        text-align: center;
        font-family: PlayfairDisplay, Georgia, Times New Roman, serif;
      }
    </style>
  </head>
  <body>
    <?php require_once('webassets/header.php'); ?>
    <?php require_once('webassets/navbar.php'); ?>


    <div class="gallery-title">
      <h1>Photo Gallery</h1>
    </div>

    <div class="container-gallery" style="margin-top: 50px;">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/bonifacio hall.png">
                <img src="images/bonifacio hall.png" alt="Bonifacio Hall" width="400" height="400">
              </a>
              <div class="desc">Bonifacio Hall</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/bonifacio hall foyer.png">
                <img src="images/bonifacio hall foyer.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Bonifacio Hall Foyer</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/canton road.png">
                <img src="images/canton road.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Canton Road</div>
            </div>
          </div>
    </div>

    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/canton road 1.png">
                <img src="images/canton road 1.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Canton Road</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/canton road private dining room.png">
                <img src="images/canton road private dining room.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Canton Road Private Dining Room</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/canton road kowloon room.png">
                <img src="images/canton road kowloon room.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Canton Road Kowloon Room</div>
            </div>
          </div>
    </div>

    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/canton road peking room.png">
                <img src="images/canton road peking room.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Canton Road Peking Room</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/executive suite.png">
                <img src="images/executive suite.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Executive Suite</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/grand ballroom.png">
                <img src="images/grand ballroom.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Grand Ballroom</div>
            </div>
          </div>
    </div>

    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street cafe.png">
                <img src="images/high street cafe.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">High Street</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street cafe 1.png">
                <img src="images/high street cafe 1.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">High Street Cafe</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street cafe 2.png">
                <img src="images/high street cafe 2.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">High Street Cafe</div>
            </div>
          </div>
    </div>

    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street cafe 3.png">
                <img src="images/high street cafe 3.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">High Street Cafe</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street cafe 4.png">
                <img src="images/high street cafe 4.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">High Street Cafe</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/horizon club lounge dining area.png">
                <img src="images/horizon club lounge dining area.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Horizon Club Lounge Dining Area</div>
            </div>
          </div>
    </div>


    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/horizon club lounge meeting room.png">
                <img src="images/horizon club lounge meeting room.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Horizon Club Lounge Meeting Room</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/horizon street lounge meeting room 2.png">
                <img src="images/horizon street lounge meeting room 2.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Horizon Street Lounge Meeting Room 2</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/high street lounge reception .png">
                <img src="images/high street lounge reception .png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">High Street Lounge Reception</div>
            </div>
          </div>
    </div>

    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/Horizon club lounge side lounge.png">
                <img src="images/Horizon club lounge side lounge.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Horizon Club Lounge Side Lounge</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/horizon deluxe king.png">
                <img src="images/horizon deluxe king.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Horizon Deluxe King</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/horizon deluxe twin.png">
                <img src="images/horizon deluxe twin.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Horizon Deluxe Twin</div>
            </div>
          </div>
    </div>


    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/hotel facade.png">
                <img src="images/hotel facade.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Hotel Facade</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/hotel facade 1.png">
                <img src="images/hotel facade 1.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Hotel Facade</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/hotel facade 2.png">
                <img src="images/hotel facade 2.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Hotel Facade</div>
            </div>
          </div>
    </div>


    <div class="container-gallery">
        <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/lobby.png">
                <img src="images/lobby.png" alt="Bonifacio Hall" width="600" height="400">
              </a>
              <div class="desc">Lobby</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/kawayan meeting room.png">
                <img src="images/kawayan meeting room.png" alt="Bonifacio Hall Foyer" width="600" height="400">
              </a>
              <div class="desc">Kawayan Meeting Room</div>
            </div>
          </div>
          
          <div class="responsive">
            <div class="gallery">
              <a target="_blank" href="images/kawayan meeting room 1.png">
                <img src="images/kawayan meeting room 1.png" alt="Canton Road" width="600" height="400">
              </a>
              <div class="desc">Kawayan Meeting Room</div>
            </div>
          </div>
    </div>
    <?php require_once('webassets/footer.php'); ?>
  </body>
</html>