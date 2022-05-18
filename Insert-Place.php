<?php 
include 'db-connect.php' ?>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $placeName = $_POST['input'];
    $description = $_POST['description'];
    $AgeCategory = $_POST['AgeCategory'];
    $location = $_POST['pac-input'];
    $feature = 0;

    if(isset($_POST['feature']) && $_POST['feature'] != 0) {
    $feature=1;
    } else {
        $feature=0;
} 



    $attachment1="";
    if(isset($_FILES['fileUpload1']['name']) && !empty($_FILES['fileUpload1']['name'])){
    $attachment1 =preg_replace('/\s+/', '_',strtolower(uniqid('',true) . $_FILES['fileUpload1']['name']));
    $attachment1_file_tmpName=$_FILES['fileUpload1']['tmp_name'];
    move_uploaded_file($attachment1_file_tmpName,'uploads/' . $attachment1);
    $attachment1='uploads/' . $attachment1;
    }
   

   $insertStr ="INSERT INTO `Place` (`age_category`, `Description`, `location`, `photo`, `place_name`,`featured`)
   VALUES ('".$AgeCategory."', '".$description."', '".$location."', '".$attachment1."', '".$placeName."','".$feature."')";
   $response= mysqli_query($connection ,$insertStr) or die(mysqli_error($connection));
  // $request_id= mysqli_insert_id($connection);
    if (mysqli_insert_id($connection)) {
    header('Refresh:2; url=Admin-Page.php');
    echo ' 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p> Place has been Added Successfully.</p>
  </div>';  

} else {
  echo "Error Adding Place: " . mysqli_error($connection);
}



  }
?>