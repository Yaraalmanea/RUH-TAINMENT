<?php include 'db-connect.php' ?>
<?php

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $placeName = $_POST['input'];

    $existingAttachment= $_POST['attachmentFile1'];

    $description = $_POST['description'];
    $AgeCategory = $_POST['AgeCategory'];
    $location = $_POST['pac-input'];

    $attachment1=$existingAttachment;
    if(isset($_FILES['fileUpload1']['name']) && !empty($_FILES['fileUpload1']['name'])){
    $attachment1 =preg_replace('/\s+/', '_',strtolower(uniqid('',true) . $_FILES['fileUpload1']['name']));
    $attachment1_file_tmpName=$_FILES['fileUpload1']['tmp_name'];
    move_uploaded_file($attachment1_file_tmpName,'uploads/' . $attachment1);
    $attachment1='uploads/' . $attachment1;
    }
     $feature = 0;
    if(isset($_POST['feature']) && $_POST['feature'] != 0) {
    $feature=1;
    } else {
        $feature=0;
        }

    $updateStr ="update Place set place_name='$placeName',age_category='$AgeCategory', photo='$attachment1',location='$location',Description='$description' ,Featured='$feature' WHERE place_id=$id";
    $result= mysqli_query($connection, $updateStr) or die(mysqli_error($connection));
    if ($result) {
    header('Refresh:2; url=Admin-Page.php');
    echo ' 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p>Place has been Updated Successfully.</p>
  </div>';  

} else {
  echo "Error updating Place: " . mysqli_error($connection);
}
           }
?>