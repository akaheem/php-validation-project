<?php
include '../config/dataConnection.php';

if (isset($_POST['submit'])){
    
    $title = $_POST['subject_title'];
    $description = $_POST['subject_description'];
    $status = $_POST['subject_status'];

    $sql = "INSERT INTO `subjects` (`subject_title`, `subject_description`, `subject_status`) VALUES ('$title', '$description', '$status')";
    $result = mysqli_query($connect, $sql);
  if(!$result){
    die(mysqli_error($connect));
    echo "got error";
  }
  else{
    header('location: ../view/index_html.php');
    // echo "okay done";
  }
}
?>