<?php
include '../controller/st_profile_courses_php.php';


// starting the session for login page
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true )
{ 
  header ("Location: login.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

    <link rel="stylesheet" href="../assets/css/add.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->

    <style>
      body{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.main{
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: row;
    /* background-color: red; */
}
.sidebar{
    width: 15%;
    min-height: 100vh;
    color: white;
    background-color: rgb(64, 81, 137);
    /* position: sticky; */
}
.dashboard{
  width: 85%;
  min-height: 100vh;
  background-color: white;
  margin-left: 12px;
  }
  /* 
.gender{
 margin-left:; 
}
*/
.footer{
    width: 100%;
    height: 100px;
    background-color: green;
}
i{
    font-size: 24px;
    padding: 0;
    margin: 0;
}
ul{
    list-style: none;
}
a{
    text-decoration: none;
    color: rgb(230, 229, 229);
}
a:hover{
    color: white;
}
.sidebar-a{
    padding-top:20px;
}
form{
    display: flex ;
    flex-direction: column;
    align-items: center;
}
    </style>
</head>
<body>
    <div class="contain">

            <!-- NAV-BAR -->
            <!-- ------- -->
            <?php
            include 'navbar.php';
            ?>
            <!-- NAV-BAR -->
            <!-- ------- -->

            <!-- --MAIN-- -->
            <!-- -------- -->
        <div class="main">

            <!-- SIDE-BAR -->
            <!-- -------- -->
            <?php
            include 'sidebar.php';
            ?>    
            <!-- SIDE-BAR -->
            <!-- -------- -->
            

            <!-- DASHBOARD -->
            <!-- --------- --> 
            <div class="dashboard">
             <div>
                  <h1 class="my-3">Add Course:</h1>
             </div>
               <div class="container mt-4">

                    <form method="post">
                        <div class="mb-3  col-md-4">
                          <label>Title</label>
                          <input type="text" class="form-control  col-md-4" id="name" name="course_title" value="" placeholder="enter course title..." >
                        </div>

                        <div class="mb-3  col-md-4">
                          <label>Description</label>
                          <input type="text" class="form-control  col-md-4" id="name" name="course_description" value="" placeholder="enter course description..." >
                        </div>

                        <div class="mb-3  col-md-4">
                          <!-- <label>Status</label> -->
                          <input type="hidden" max="1" maxlength="1" class="form-control  col-md-4" id="name" name="course_status" value="1" placeholder="enter only 0 or 1..." >
                        </div>
                        <div class="text-end">                        
                          <button class="btn btn-primary" name="submit" type="submit" >Submit</button>
                        </div>    
                    </form>

               </div>
            </div>
        </div>
    </div>                    
</body>
</html>