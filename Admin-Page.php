
<?php 
include("db-connect.php");
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width  initial-scale= 1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <title>RUH-tainment</title>
     <!--  -->
     <link rel="stylesheet" href="style2.css">
      <link href='https://css.gg/user.css' rel='stylesheet'>
      <link href='https://css.gg/close.css' rel='stylesheet'>
      <link href='https://css.gg/menu.css' rel='stylesheet'>
      <link href='https://css.gg/search.css' rel='stylesheet'>
      <link href='https://css.gg/log-off.css' rel='stylesheet'>

      <!--  -->
    </head>


    <body>


<!--  -->
      <section class="header">
        <nav>
            <a href="Admin-Homepage.php"> <img src="images/logo.png"> </a>
            <div class="nav-links" id="navLinks">
                <i class="gg-close fa"  onclick="hideBurger()"></i>
                <ul>
                    <li> <a href="Admin-Homepage.php"> HOME </a></li>
                    <li> <a href="Admin-Page.php"> PLACES <br></a></li>
                    <li style="position:absolute;"> <a href="Logout.php" > <i class="gg-log-off"></i></a> </li> 
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
<!--  -->

      <br>


     <div class="heading">
        <h1> ENTERTAINMENT PLACES </h1> 
     </div>
  
       <div class="container" >

        <div class="btn-group">
          
          <button type="button" class="btn btn-sm btn-success"> Sort </button>
          <button type="button" class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          
  
          <div class="dropdown-menu">
            <a class="dropdown-item" href="Admin-Page.php?sort=atoz">A-Z</a>
            <a class="dropdown-item" href="Admin-Page.php?sort=featured"> Featured </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Admin-Page.php?sort=Family"> Family </a>
            <a class="dropdown-item" href="Admin-Page.php?sort=Children"> Children </a>
            <a class="dropdown-item" href="Admin-Page.php?sort=Adult"> Adult </a>
          </div>
        
        </div>
        <button type="button" class="btn btn-sm btn-success" onclick="document.location='AddPlace.php'" style="float:right"> Add place </button>

  
  
          
  

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">

 <?php 
 if(isset($_GET['sort'])){
        $sort=$_GET['sort'];
        if($sort=="featured"){
         $query="select * FROM place where featured=1";
        }
        if($sort=="atoz"){
         $query="select * FROM place order by place_name";
        }
         if($sort=="Family"){
         $query="select * FROM place where age_category='Family'";
        }
         if($sort=="Children"){
         $query="select * FROM place where age_category='Children'";
        }
         if($sort=="Adult"){
         $query="select * FROM place where age_category='Adult'";
        }
        if($sort!="Adult" && $sort!="Children" && $sort!="Family"&&  $sort!="atoz"&& $sort!="featured"){
         $query="select * FROM place where place_name like '%".$sort."%'";
        }
     }
 if(!isset($_GET['sort'])){
  $query="select * FROM place";
 }


   $result = mysqli_query($connection, $query);

 if ( $result ){
     while ($row = mysqli_fetch_array($result) ) {
                            ?>

<div class="col mb-4">
    <div class="card">
      <a class="card-img-top">
        <span class="card-header" style="background-image: url(<?php echo $row['photo'] ?>)" > <span class="card-title"> <h2><?php echo $row['place_name'] ?> </h2> </span> </span>
      </a>
      <div class="card-body">
        <div class="card-text rating">
        <?php 
        $placeId1= $row['place_id'];
        //count..
         $sql="SELECT COUNT(*) AS `count` FROM reviews where place_id='".$placeId1."'";
         $result1=mysqli_query($connection,$sql);
         $row1 = mysqli_fetch_assoc($result1);
         $count = $row1['count'];
         //sum star
         $sq2="SELECT sum(star) AS `sum` FROM reviews where place_id='".$placeId1."'";
         $result2=mysqli_query($connection,$sq2);
         $row2 = mysqli_fetch_assoc($result2);
         $sum = $row2['sum'];
         $starValue=0;
         if($count>0){
           $starValue= $sum/$count;
         }
        ?>
        <?php if($starValue==0){
        ?>
            <i id="start1" class="fa fa-star"></i>
            <i id="start2" class="fa fa-star"></i>
            <i id="start3" class="fa fa-star"></i>
            <i id="start4" class="fa fa-star"></i>
            <i id="start5" class="fa fa-star"></i>
        <?php }?>

          <?php if($starValue<1 &&  $starValue>0){
        ?>
            <i id="start1" class="fa fa-star checked"></i>
            <i id="start2" class="fa fa-star"></i>
            <i id="start3" class="fa fa-star"></i>
            <i id="start4" class="fa fa-star"></i>
            <i id="start5" class="fa fa-star"></i>
        <?php }?>

          <?php if($starValue<2 &&  $starValue>1){
        ?>
            <i id="start1" class="fa fa-star checked"></i>
            <i id="start2" class="fa fa-star checked"></i>
            <i id="start3" class="fa fa-star"></i>
            <i id="start4" class="fa fa-star"></i>
            <i id="start5" class="fa fa-star"></i>
        <?php }?>
         <?php if($starValue<3 &&  $starValue>2){
        ?>
            <i id="start1" class="fa fa-star checked"></i>
            <i id="start2" class="fa fa-star checked"></i>
            <i id="start3" class="fa fa-star checked"></i>
            <i id="start4" class="fa fa-star"></i>
            <i id="start5" class="fa fa-star"></i>
        <?php }?>
        <?php if($starValue<4 &&  $starValue>3){
        ?>
            <i id="start1" class="fa fa-star checked"></i>
            <i id="start2" class="fa fa-star checked"></i>
            <i id="start3" class="fa fa-star checked"></i>
            <i id="start4" class="fa fa-star checked"></i>
            <i id="start5" class="fa fa-star"></i>
        <?php }?>
         <?php if($starValue>4){
        ?>
            <i id="start1" class="fa fa-star checked"></i>
            <i id="start2" class="fa fa-star checked"></i>
            <i id="start3" class="fa fa-star checked"></i>
            <i id="start4" class="fa fa-star checked"></i>
            <i id="start5" class="fa fa-star checked"></i>
        <?php }?>
            
        </div>
    <div class="card-text">
        <p> <?php echo $row['Description'] ?></p>
        <h6> <i class="material-icons"> family_restroom </i>  <?php echo $row['age_category'] ?> </h6>
        <button class="button"  onclick= "window.location.href='reviewss-Admin.php?id=<?php echo $row['place_id'] ?>';"  type="button"><span> View Place </span></button>
    </div>
    </div>
    </div>
 </div>

   <?php   }
                          }
                          
                            ?>



</div> 
</div>

<footer>
   
  <hr style="width:50%; margin-left:25% !important; margin-right:25% !important;">
 <footer class="stickyfooter"> Copyright 2022 - RUH-tainment ALL Rights Reserved </footer>


</footer>

 <!-- MENU TOGGLE -->
       

 
 <script>

     var navLinks = document.getElementById("navLinks");

     function search() {
                 url = 'Admin-Page.php?sort='+document.getElementById("srch").value;
                 window.open(url);
            }

     function hideBurger() {
         navLinks.style.right="-300px";
        //  document.getElementById("gg-menu").style.display="block";
     }
     function showBurger() {
         navLinks.style.right="0";
        //  document.getElementById("gg-menu").style.display="none";
     }
 </script>
 <!--  -->

</body>
</html>