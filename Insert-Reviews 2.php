<?php 
include 'db-connect.php' 
?>
<?php
$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`
 
    $name = $_POST['username'];
    $review = $_POST['comments'];
    $placeId = $_POST['placeId'];
    $date=date('Y-m-d H:i:s');
    $star= $_POST['star'];;
   
   $insertStr ="INSERT INTO `reviews` (`comments`, `date`, `place_id`, `star`, `username`)
   VALUES ('".$review."', '".$date."', '".$placeId."', '".$star."', '".$name."')";
   $response= mysqli_query($connection ,$insertStr) or die(mysqli_error($connection));
   //$response= mysqli_query($connection ,$insertStr) or die(mysqli_error($connection));

   $request_id= mysqli_insert_id($connection);

  header("Location:reviewss.php?id=".$placeId);
?>