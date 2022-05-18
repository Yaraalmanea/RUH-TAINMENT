<?php 
include 'db-connect.php' ?>
<?php
$placeId=0;
    if(isset($_GET['id'])){
        $placeId=$_GET['id'];
          $query="delete  FROM place WHERE place_id='$placeId'" ;
         // $result = mysqli_query($connection, $query);

             if (mysqli_query($connection, $query)) {
    header('Refresh:2; url=Admin-Page.php');
    echo ' 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p> Place has been Deleted Successfully.</p>
  </div>';  

} else {
  echo "Error Deleting Place: " . mysqli_error($connection);
}
           }
?>