<?php
include '../config/dataConnection.php';

if (isset($_POST['submit'])){
    // $sno = $_POST['sno'];
    // echo "<pre>";print_r($_POST);echo"</pre>";
    // exit();
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];   
    // $course = array_filter($_POST['courses']);
    // $courses = implode (",", $course);
    $courses = $_POST['courses'];
    $subject = array_filter($_POST['subjects']);
    $subjects = implode (",", $subject);
    //   $password = $_POST['password'];
    //   $allhobbies = array_filter($_POST['hobbies']);
    //   $hobbiz = array_filter ($allhobbies);
    //   $subjects = array_filter($_POST['subject']);
    //   $subject = implode (",", $subjects);
    //   $address = $_POST['address'];
    // echo $allhobbies;echo "<br>";
    // echo $hobbies;
    // exit();

    $sql = "INSERT INTO `st_profile` (`name`, `email`, `gender`, `courses`, `subjects`, `dob`, `contact`) VALUES ('$name', '$email', '$gender', '$courses', '$subjects', '$dob', '$contact')";
    // echo $sql;
    $result = mysqli_query($connect, $sql);
  if(!$result){
    die(mysqli_error($connect));
    // echo "got error";
  }
  else{
    header('location: ../view/st_profile_view_html.php');
    // echo "okay done";
  }
}
?>