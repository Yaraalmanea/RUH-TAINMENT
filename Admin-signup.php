<?php

session_start();
require_once ("db-connect.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password_hashed) && !is_numeric($username))
        {
     $query = "SELECT * FROM Admin WHERE username = '$username' limit 1";
        
        $result = mysqli_query($connection,$query);
        
        if($result && mysqli_num_rows($result) > 0){
            
            echo "<script> alert('This user already exists !') </script>";
        }
        else{
         // SAVE TO DATABASE
      
            $sql = "INSERT INTO Admin ( username, first_name, last_name, password) VALUES ( '$username', '$first_name', '$last_name', '$password_hashed')";
        
       if(mysqli_query($connection, $sql)){
        echo "new record created successfully";
        header("location: Admin-Homepage.php");

       }
       else{
           echo "<script> alert('No record added !') </script>";
       }
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

                <div class="emp-login-form" style="width: 280px;">
                    <!-- <img src="images/login-signup-icon-png-7.png"> -->
                    <h1> SIGN UP </h1>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                      <input type="text" class="input-box" name="username" maxlength="24" minlength="10" placeholder="Enter Username" style="color: #0F222D ;" required>
                      <input type="text" class="input-box" name="first_name" maxlength="20" placeholder="Enter Your First Name" style="color: #0F222D;" required>
                      <input type="text" class="input-box" name="last_name" maxlength="20" placeholder="Enter Your Last Name" style="color: #0F222D;" required>
                      <input type="password" name="password" class="input-box" placeholder="Enter Your Password" style="color: #0F222D;" required> <br> <br>
          
                      <button class="login-btn" type="submit" style="padding: 10px 100px;"> Sign Up </button>
                    </form>
                </div>
                   
                 </div>

        </section>

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

<hr style="width:50%; margin-left:25% !important; margin-right:25% !important;">
<footer class="stickyfooter"> Copyright 2022 - RUH-tainment ALL Rights Reserved </footer>
    </body>

</html>