<?php 
include("db-connect.php");
 $placeId=0;
    if(isset($_GET['id'])){
        $placeId=$_GET['id'];
           }
?>
 <?php 
   $query="select * FROM place WHERE place_id='$placeId'" ;
   $result = $connection->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $photo=$row['photo'] ;
        $location=$row['location'] ;
        $placeName=$row['place_name'] ;

        }}
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
      <link rel="stylesheet" href="review.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                      <input class="search-txt" type="text" name="" id="srch"  placeholder="Type to search">
                      <button class="search-btn" onclick="search()" style="border: none;"> <i class="gg-search"></i></button>
                    </div>
            </div>

        </section>

        <br>
        <div class="winH1">
        <h1>  <?php echo $placeName ?> </h1>   </div>
        
       
        <div id="wrDiv"  style="float:right; margin-right:110px; margin-top:8px; margin-bottom:10px; padding:8px; width:130px; background-color: #0ea812; ">
                <a href="#write" class="button1" id="wr"  style="font-size:14px;"><i class="fa fa-pencil"></i> POST A REVIEW</a> 
       </div> 

       <hr style="width:45%; text-align:center; margin-left:26%; margin-top:3px; height:6px; color:rgb(255, 255, 255); background-color:rgba(149, 214, 100, 0.66) ; margin-bottom:-40px;">

          
<br><br><br><br>
<img src="<?php echo $photo ?>" alt=""  class="winImg">
<br>
<iframe src="<?php echo $location ?>"
class="frame"
></iframe>


        <section class="reviews">
      
        <div>
         <h2 style="text-align:center; font-size:36px; font-weight: 600; color: rgba(66, 70, 62, 0.66); margin-bottom:0px;  margin-top:0;"> All Reviews On <?php echo $placeName ?> </h2>
        <hr style="width:67%; text-align:center; margin-left:17%; height:6px; color:rgb(255, 255, 255); background-color:rgba(149, 214, 100, 0.66) ; margin-bottom:10px;">  
       </div>
       
<br> 
          

             <?php 
  $query="select * FROM reviews WHERE place_id='$placeId' ORDER BY date DESC" ;
   $result = mysqli_query($connection, $query);

 if ( $result ){
     while ($row = mysqli_fetch_array($result) ) {
                            ?>
                <div class="reviews-col">
                    <img src="Images/user1.png">
                    <div>
                      <h3> <?php echo $row['username'] ?> </h3>
                       <p> <?php echo $row['comments'] ?> </p>
                       <?php if($row['star']==5){ ?>
                       <i class="fa fa-star "></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <?php }?>
                       <?php if($row['star']==4){ ?>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <?php }?>
                        <?php if($row['star']==3){ ?>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <?php }?>
                        <?php if($row['star']==2){ ?>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <?php }?>
                       <?php if($row['star']==1){ ?>
                       <i class="fa fa-star"></i>
                       <?php }?>
                    </div>
                </div>
              <?php   }
                          }
                          
                            ?>
           
            <br> 
            <br> 

            <div id="postReview">
                <form id="write" method="POST" action="Insert-Reviews.php">
                       <input type="hidden" name="placeId" id="placeId" value="<?php echo $placeId ?>" />
                       <input type="hidden" class="starHidden" name="star" id="star" value="1" />
                    <h2 ><i class="fa fa-pencil"></i> Review & Rate </h2>
                    <div class="revImg"><img src="Images/user1.png" width="8%"  style="float: left; display: block;  overflow: hidden; ">  
                  
                 
                    <div class="rates">
                        <span id="countStar" style="color:black;">1</span><p> out of 5 stars </p>
                       <div id="star1" class="star1 fa fa-star checked"></div>
                       <div id="star2" class="fa fa-star"></div>
                       <div id="star3" class="fa fa-star"></div>
                       <div id="star4" class="fa fa-star"></div>
                       <div id="star5" class="fa fa-star"></div> 
                     
                     </div> <br>

                   
                       <label for="name" style="text-align:left; display:block; margin-left:15px;  margin-bottom:-15px; font-size: 21px; color:#073763 ; font-weight:bold;"> Name : </label>  
                       <br>
                       <input required type="tex"  id="username" name="username" placeholder=" Enter your name" style="float:left; margin-left:15px;">
                       <br> <br>
                      
                        <label for="name" style="text-align:left; display:block; margin-left:15px; margin-bottom:-15px; font-size: 21px; color:#073763 ; font-weight:bold;"> Review :  </label> <br>
                        <textarea required id="comments" name="comments" rows="5" cols="70" placeholder="Enter your Review" style="float:left; margin-left:15px;"> </textarea>
                       
                        <br><br><br><br><br>

                       <button  class="button" id="btnPost"  style="float:center; margin-left:-431px;" value="post"> POST </button>
                      <!-- <button   class="button"  style="float:center; margin-left:15px;" value="cancel"> CANCEL </button>
                     -->
                    </form>
                    <br>
                    <br>
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

<script>

 $(document).on('click', '#star1', function() { 
 $("#star1").addClass("checked");
 $("#star2").removeClass("checked");
 $("#star3").removeClass("checked");
 $("#star4").removeClass("checked");
 $("#star5").removeClass("checked");
 $("#countStar").text('1');
 $("input[name=star]").val("1");
 });

  $(document).on('click', '#star2', function() { 
 $("#star1").addClass("checked");
 $("#star2").addClass("checked");
 $("#star3").removeClass("checked");
 $("#star4").removeClass("checked");
 $("#star5").removeClass("checked");
 $("#countStar").text('2');
 $("input[name=star]").val("2");
 });
  $(document).on('click', '#star3', function() { 
 $("#star1").addClass("checked");
 $("#star2").addClass("checked");
 $("#star3").addClass("checked");
 $("#star4").removeClass("checked");
 $("#star5").removeClass("checked");
 $("#countStar").text('3');
 $("input[name=star]").val("3");
 });

   $(document).on('click', '#star4', function() { 
 $("#star1").addClass("checked");
 $("#star2").addClass("checked");
 $("#star3").addClass("checked");
 $("#star4").addClass("checked");
 $("#star5").removeClass("checked");
 $("#countStar").text('4');
 $("input[name=star]").val("4");
 });
  $(document).on('click', '#star5', function() { 
 $("#star1").addClass("checked");
 $("#star2").addClass("checked");
 $("#star3").addClass("checked");
 $("#star4").addClass("checked");
 $("#star5").addClass("checked");
 $("#countStar").text('5');
 $("input[name=star]").val("5");
 });
</script>



<script>
 $(document).ready(function(){

   $("#").click(function(){
 
    var postForm = { 
            'username': $('input[name=username]').val(),
            'comments': $('input[name=comments]').val(),
            'placeId': $('input[name=placeId]').val(),
        };
           alert(postForm);
          $.ajax({ 
            type      : 'POST', 
            url       : 'Insert-Reviews.php', 
            data      : postForm , 
            dataType  : 'json',
            success   : function() {
                             alert("sucess");
                                // header("Location:reviewss.php?id=".$placeId);
                                 if (!data.success) { //If fails
                                if (data.errors.name) { //Returned if any error from process.php
                                    alert(data.errors.name); //Throw relevant error
                                }
                            }
                            else {
                            alert(data.posted);
                                }
                            }
        });
           event.preventDefault(); //Prevent the default submit
  });

});
</script>
</body>
</html>
        

