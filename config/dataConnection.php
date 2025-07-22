<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "st_registration";

$connect = new mysqli($servername, $username, $password, $database);
if(!$connect){
  echo "You Got Error".mysqli_error($connect);
}
// else{echo "Success<br>";}
// echo"<pre>";echo print_r($connect);echo"</pre>";
?>