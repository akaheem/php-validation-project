<?php
include '../controller/index_php.php';

session_start();  
echo  "<pre>"; print_r($_SESSION);echo  "</pre>";
// die();
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
    <link rel="shortcut icon" href="../assets/images/crud_logo.png" type="image/x-icon">
    <title>Registration</title>

    <!-- <link rel="stylesheet" href="../assets/css/index.css"> -->
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
.navbar{
    position: sticky;
}
.sidebar{
    width: 15%;
    min-height: 100vh;
    color: white;
    background-color: rgb(64, 81, 137);
    position: sticky;
}
.dashboard{
    width: 85%;
    min-height: 100vh;
    background-color: white;
    margin-left: 12px;
}
.gender{
margin-left: 32px;
}
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
/* label {
    display: inline-block;
    margin: 0;
    padding: 0;
    font-size: 16px;
  } */
  /* input[type="radio"] {
    margin-right: 5px;
  } */
/* form{
    display: flex ;
    flex-direction: column;
    align-items: center;
} */
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
                  <h1 class="my-3 text-center">CRUD Application (DropDown)</h1>
                </div>
              <div class="container mt-4">
                <form method="post">
                  <div class="row">

                      <div class="mb-3  col-md-6">
                          <label>Name</label>
                          <input type="text" class="form-control  col-md-4" id="name" name="name" value="" placeholder="enter your name..." >
                      </div>
      
                      <div class="mb-3  col-md-6">
                          <label>Email</label>
                          <input type="email" class="form-control col-md-4" id="email" name="email" value="" placeholder="enter your Email...">
                      </div>  
      
                      <!-- <div class="mb-3 col-md-4">
                          <label>Password</label>
                          <input type="password" class="form-control" id="password" name="password" value=""  placeholder="type password...">
                      </div> -->
              
                      <div class="col-md-4 mb-3">
                        <label>Contact No:</label>
                        <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact Number">
                      </div>
      
                      <div class="col-md-4 mb-3">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="enter your DOB...">
                      </div>
                      
                        <div class="mt-4 col-md-4">
                          <label>Gender</label>
                          <input type="hidden" name="gender">
                            <input type="radio" name="gender" id="male" class="gender col" value="Male"><label for="male">Male</label><input type="radio" name="gender" id="female" class="gender col" value="Female"><label for="female">Female</label><input type="radio" name="gender" id="other" class="gender col" value="Other"><label for="other">Other</label>
                        </div>
                            
                        <div class="mb-3 col-md-4">
                          <label>Courss</label>
                        <div>
                        <select class="form-control" style="width: 100%;" id="courses" name="courses">
                          <option value="">Select Course</option>
                          <?php
                            $sql    = "SELECT * FROM `courses` WHERE course_status = 1";
                            $result =  mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                              ?>
                              <option value="<?php echo $row["cid"] ?>"><?php echo $row["course_title"] ?></option>
                            <?php
                          }
                            ?>
                        </select>
                        </div>
                        </div>

                        <div class="mb-3 col-md-4">
                          <label>Subjects</label>
                          <input type="hidden" name="subjects">
                        <div>
                          <select class="form-control" style="width: 100%;" id="subjects" name="subjects[]" multiple>
                            <option value="">Select Course</option>
                            <?php
                              $sql    = "SELECT * FROM `subjects` WHERE subject_status = 1";
                              $result =  mysqli_query($connect, $sql);
                              while($row = mysqli_fetch_assoc($result)){
                            ?>
                              <option value="<?php echo $row["sid"] ?>"><?php echo $row["subject_title"] ?>
                            </option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
 
                      <div class="text-end">                        
                        <button class="btn btn-primary" name="submit" type="submit" >Submit</button>
                      </div>
                  </form>
                  </div> 
            </div>
            
            <!-- DASHBOARD -->
            <!-- --------- --> 

          </div>
            <!-- --MAIN-- -->
            <!-- -------- -->


                                                                    <!-- --FOOTER-- -->
                                                                      <!-- ---------- --> 
                                                                    
                                                                      <!-- --FOOTER-- -->
                                                                      <!-- ---------- -->
          
      </div>
</body>
</html>