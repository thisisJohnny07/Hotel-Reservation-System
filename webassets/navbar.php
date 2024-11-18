<head>
  <style>
    /* Navbar styles */
  ul.navbar {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
      display: flex;
      justify-content: center;
  }

  li.navitem {
      margin: 0 5%;
  }

  li.navitem a.navigator {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 10px;
      text-decoration: none;
  }

  li.navitem a:hover {
      background-color: white;
      color: black;
  }

  /* Dropdown styles */
  .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      width: 100%;
      left: 0;
      z-index: 1000; /* Set a higher z-index value */
      align-items: center; /* Center content vertically */
      text-align: center; /* Center content horizontally */
      padding: 20px 0 0 0;
      animation: slideInAndFade .3s forwards;
  }

  @keyframes slideInAndFade {
      0% {
          opacity: 0;
          transform: translateY(-20px); /* Move up by 20 pixels */
      }
      100% {
          opacity: 1;
          transform: translateY(0); /* Move back to its original position */
      }
  }

  .dropdown-content a {
      color: black;
      text-decoration: none;
      display: block;
      text-align: left;
  }

  .dropdown-content a:hover {
      background-color: #ddd;
      color: black;
  }

  /* Show dropdown when hovering over parent item */
  li.navitem:hover .dropdown-content {
      display: block;
  }

  /* Define styles for columns */
  .column {
      display: table-cell; /* Display columns like table cells */
      vertical-align: top; /* Align content at the top */
  }

  /* Style links within columns */
  .column a {
      color: black;
      padding: 6px 0; /* Adjust padding as needed */
      text-decoration: none;
      display: block;
      text-align: left;
  }

  .dropdown-content .column a:hover {
      color: #B49852;
  }
  /* Style links within columns */
  .column a {
      font-weight: normal; /* Set font weight to normal */
  }

  .txt-down {
      float: left;
      margin-left: 2%;
  }

  hr {
      width: 96%;
      height: .5px;
  }
    </style>
</head>


<ul class="navbar">
    <li class="navitem"><a class="navigator" href="about.php">ABOUT</a></li>
    <li class="navitem">
        <a class="navigator" href="#news">ROOM & SUITES <i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <div>
          <?php
            $statement = $pdo->prepare("SELECT * FROM rooms
            INNER JOIN roomCategories ON rooms.roomCategoryId = roomCategories.id");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Initialize a variable to keep track of displayed categories
            $displayed_categories = array();

            foreach ($result as $row) {   
              $category_id = $row['roomCategoryId'];
              $category_name = $row['category'];

              // Check if this category has been displayed before
              if (!in_array($category_name, $displayed_categories)) {
                // If not, display the category and mark it as displayed
                $displayed_categories[] = $category_name;
            ?>
              <div class="column">
                <h4><?php echo $category_name; ?></h4>
                <?php
                  // Now fetch and display rooms for this category
                  $statement_rooms = $pdo->prepare("SELECT * FROM rooms WHERE roomCategoryId = ?");
                  $statement_rooms->execute([$category_id]);
                  $rooms = $statement_rooms->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rooms as $room) {
                ?>
                  <a href="room.php?id=<?php echo $room['id']; ?>"><?php echo $room['roomName']; ?></a>
                <?php
                  }
                ?>
              </div>
            <?php
                }
              }
            ?>
          </div>
          <div>
            <hr>
            <p class="txt-down">ROOM AND SUITES</p>
          </div>
      </div>
    </li>
    <li class="navitem"><a class="navigator" href="photogallery.php">GALLERY</a></li>
    <li class="navitem"><a class="navigator" href="index.php#1">OFFERS</a></li>
    <li class="navitem"><a class="navigator" href="privacyPolicy.php">PRIVACY POLICY</a></li>
</ul>


