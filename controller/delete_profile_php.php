<?php
include '../config/dataConnection.php';

if (isset($_GET['deletepro'])){
    $sno = $_GET['deletepro'];
    
    $sql = "DELETE FROM `st_profile` WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    // echo "dlkfh";
    // exit();
    if(!$result){
        die(mysqli_error($connect));
        echo "eroor";
    }
    else{
        echo "deleted";
        // header ('location: ../view/st_view_html.php');
    }
}
?>