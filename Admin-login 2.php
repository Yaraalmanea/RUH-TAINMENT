<?php

session_start();
include("db-connect.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
   

    if (!empty($username) && !empty($password)) {
        //READ FROM DATABASE
        $query = "SELECT * FROM Admin WHERE username = '$username' limit 1";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
           
            
            if (password_verify($password, $userData['password'])) {         
            // Redirect user to welcome page
             
                $_SESSION["username"] = $userData['username'];
                $_SESSION["first_name"] = $userData['first_name'];
                $_SESSION["loggedin"] = true;
                header("location: Admin-Homepage.php");

            }
            else {

                echo "<script> alert('Wrong Password ! '); </script>";
            }
        }
        else {
            echo "<script> alert('Admin username does not exist ! '); </script>";
        }   
    
    }
    
    else {
        echo "<script> alert('Please enter valid information !'); </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width  initial-scale= 1.0">
        <link rel="stylesheet" href="style.css">
        <link href='https://css.gg/user.css' rel='stylesheet'>
        <link href='https://css.gg/close.css' rel='stylesheet'>
        <link href='https://css.gg/menu.css' rel='stylesheet'>
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
                        <li> <a href="viewPlaces.php"> PLACES </a></li>
                        <li style="position:absolute; "> <a href="Admin-login.php"> <i class="gg-user"></i></a> </li> 
                    </ul>
                </div>
                <i class="gg-menu fa" onclick="showBurger()"></i>
            </nav>

                <div class="emp-login-form" style="position: relative;">
                    <!-- <img src="images/admin.png"> -->
                    <h1> LOG IN  </h1>
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                      <input type="text" class="input-box" name="username" maxlength="24" minlength="10" placeholder="Enter Admin Username" style="color: #073763;" required>
                      <input type="password" name="password"  class="input-box" placeholder="Enter Admin Password" style="color: #073763;" required> <br> <br>
                      
                      <button class="login-btn" type="submit"> Log In </button>
                      
                    </form>
                 </div>
        
                  <div class="new-signup" style="text-align: center; color: white;">
                      New Admin? <a class="hovsign" href="Admin-signup.php" style="text-decoration: none;"> Sign Up </a>
                  </div>
                   
                 </div>

        </section>

         <hr style="width:50%; margin-left:25% !important; margin-right:25% !important;">
        <footer class="stickyfooter"> Copyright 2022 - RUH-tainment ALL Rights Reserved </footer>


        <script>

            var navLinks = document.getElementById("navLinks");

            function search() {
                 url = 'Admin-Page.php?sort='+document.getElementById("srch").value;
                 window.open(url);
            }
  
            function hideBurger() {
                navLinks.style.right="-300px";
                // document.getElementById("gg-menu").style.display="block";
            }
            function showBurger() {
                navLinks.style.right="0";
                // document.getElementById("gg-menu").style.display="none";
  
            }
        </script> 
         
    </body>

</html>

