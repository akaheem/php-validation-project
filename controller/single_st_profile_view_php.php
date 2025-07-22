<?php
include '../config/dataConnection.php';
if(isset($_GET['viewRecord'])){
// $sno = $_GET['viewRecord'];
  $id = mysqli_real_escape_string($connect, $_GET['viewRecord']);
  // $sql = "SELECT * FROM `st_profile` WHERE id=$id";

  // $sql = "SELECT p.id,p.name,p.email,p.contact,p.dob,c.course_title,c.course_description,c.course_status,s.subject_title,s.subject_description,s.subject_status FROM `st_profile` p INNER JOIN `courses` c ON p.courses=c.cid INNER JOIN `subjects` s ON p.subjects=s.sid WHERE id=$id;";
  
  $sql = "SELECT p.id,p.name,p.email,p.contact,p.dob,c.course_title,c.course_description,c.course_status,s.subject_title,s.subject_description,s.subject_status FROM `st_profile` p INNER JOIN `courses` c ON (p.courses,c.cid) INNER JOIN `subjects` s ON (p.subjects,s.sid) WHERE id=$id;";
  
  $result = mysqli_query($connect, $sql);
  if (!$result) {
      die(mysqli_error($connect));
  }
  
  $row = mysqli_fetch_assoc($result);
  
  // mysqli_free_result($result);
  // mysqli_close($connect);

// $name = $row['name'];
// $email = $row['email'];
// $gender = $row['gender'];
// $allhobbies = $row['hobbies'];
// $hobbies = explode(",", $allhobbies);
// $dob = $row['dob'];
// $number = $row['number'];
// $address = $row['address'];
}
?>