<?php
    include '../config/dataConnection.php';
    $id = $_GET['updatepro'];

    $sql    = "SELECT * FROM `st_profile` WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
    die(mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);
//  echo "<pre>"; print_r($row);echo "</pre>";
//  exit();
//  Assign the fetched data to variables
    $name     = $row['name'];
    $email    = $row['email'];
    $gender   = $row['gender'];
    $contact  = $row['contact'];
//  $allhobbies = $row['hobbies'];
    $course   = $row['courses'];
    $courses  = explode(",", $course);
    // $courses = $row['courses'];
    $subject  = $row['subjects'];
    $subjects = explode(",", $subject);
//  $subject = ['subject'];
    $dob      = $row['dob'];


//  $address = $row['address'];
    if (isset($_POST['submit'])) {
//  Retrieve form data
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $gender   = $_POST['gender'];
    $dob      = $_POST['dob'];
    $contact  = $_POST['contact'];
    $courses  = $_POST['courses'];
    $subject  = array_filter($_POST['subjects']);
    $subjects = implode(",", $subject);
    
    $sql = "UPDATE `st_profile` SET `name` = '$name', `email` = '$email', `contact` = '$contact', `dob` = '$dob', `courses` = '$courses', `subjects` = '$subjects', `gender` = '$gender' WHERE `id` = $id";

    $result = mysqli_query($connect, $sql);
    if (!$result) {
        die(mysqli_error($connect));
    } else {
        // echo "updated";
        // echo "<pre>"; print_r($_POST);echo "</pre>";
        // echo "<pre>"; print_r($sql);echo "</pre>";
        // exit();
        header('location: ../view/st_profile_view_html.php');
    }
    }
?>