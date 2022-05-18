<?php 
include("db-connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width  initial-scale= 1.0">
      <link rel="stylesheet" href="style.css">
      <link href='https://css.gg/user.css' rel='stylesheet'>
      <link href='https://css.gg/close.css' rel='stylesheet'>
      <link href='https://css.gg/menu.css' rel='stylesheet'>
      <link href='https://css.gg/search.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <title> RUH-tainment </title>
    </head>

    <body>
        <section class="header">
            <nav>
                <a href="Homepage.php"> <img src="images/logo.png"> </a>
                <div class="nav-links" id="navLinks">
                    <i class="gg-close fa"  onclick="hideBurger()"></i>
                    <ul>
                        <li> <a href="Homepage.php"> HOME </a></li>
                        <li> <a href="viewPlaces.php"> PLACES <br></a></li>
                        <li style="position:absolute;"> <a href="Admin-login.php" > <i class="gg-user"></i></a> </li> 
                    </ul>
                </div>
                <i class="gg-menu fa" id="gg-menu" onclick="showBurger()"></i>
            </nav>

            <div class="text-box">
                <h1> VISIT RIYADH <br> <br> </h1>
                <P> <br> <br></P>
                    <div class="search-box">
                      <input class="search-txt" type="text" name="" id="srch" placeholder="Type to search">
                      <button class="search-btn" onclick="search()" style="border: none;"> <i class="gg-search"></i></button>
                    </div>
            </div>

        </section>

        <section class="places">
            <a href="viewPlaces.php"> <h1> View More Entertainment Places </h1> </a>
            <!-- <p> </p> -->

            <div class="row">
               <?php 
  $query="select * FROM place where featured!=1 LIMIT 3";
   $result = mysqli_query($connection, $query);
 if ( $result ){
     while ($row = mysqli_fetch_array($result) ) {
                            ?>
                <div class="places-col p1">
                    <img src="<?php echo $row['photo'] ?>">
                    <div class="layer">
                        <h3><?php echo $row['place_name'] ?> </h3>
                    </div>
                </div>
                <?php }}?>
            </div>
        </section>


        <section class="places">
             <a  href="viewPlaces.php?sort=featured"> <h1> Featured Now </h1> </a>

            <p> Time is running, Don't miss out on the fun! </p> 

            <div class="row">
                         <?php 
    $query="select * FROM place where featured=1 LIMIT 3";
   $result = mysqli_query($connection, $query);
 if ( $result ){
     while ($row = mysqli_fetch_array($result) ) {
                            ?>
                <div class="places-col last-chance">
                    <img src="<?php echo $row['photo'] ?>">
                    <div class="layer">
                        <h3> <?php echo $row['place_name'] ?> </h3>
                    </div>
                </div>

                 <?php }}?>
            </div>
        </section>

        
        <section class="reviews">
            <a href=""><h1>Reviews</h1> </a>
            

            <div class="row">
                <div class="reviews-col">
                    <img src="Images/user1.png">
                    <div>
                        <p> We tried almost all the rides except the one that will hang you upside down ! the horror house is the best and funniest , we enjoyed  and are definitely gonna visit again! </p>
                       <h3>Ahmed</h3>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="reviews-col">
                    <img src="Images/user1.png">
                    <div>
                        <p> Rides were so busy and it takes forever to get on any game here! there is no enough chairs/tables for when you would like to rest a little.</p>
                        <h3>Faisal</h3>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                    </div>
                </div>

            </div>
        </section>

        <!-- MENU TOGGLE -->
       

         <hr style="width:50%; margin-left:25% !important; margin-right:25% !important;">
        <footer class="stickyfooter"> Copyright 2022 - RUH-tainment ALL Rights Reserved </footer>

        <script>

            var navLinks = document.getElementById("navLinks");

            function search() {
                 url = 'viewPlaces.php?sort='+document.getElementById("srch").value;
                 window.open(url);
            }

            function hideBurger() {
                navLinks.style.right="-300px";
               
            }
            function showBurger() {
                navLinks.style.right="0";
               
            }

        </script>

    </body>
</html>

