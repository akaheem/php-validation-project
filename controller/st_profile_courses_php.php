<?php
include '../config/dataConnection.php';

if (isset($_POST['submit'])){
    
    $title = $_POST['course_title'];
    $description = $_POST['course_description'];
    $status = $_POST['course_status'];

    $sql = "INSERT INTO `courses` (`course_title`, `course_description`, `course_status`) VALUES ('$title', '$description', '$status')";
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