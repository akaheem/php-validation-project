<?php
include '../controller/index_php.php';

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true )
// echo  "<pre>"; print_r($_SESSION['loggedin']);echo  "</pre>";
// die();
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
    /* min-height: 100vh; */
    display: flex;
    flex-direction: row;
    /* background-color: red; */
}
.navbar{
    position: sticky;
}
.sidebar{
    width: 15%;
    /* min-height: 100vh; */
    color: white;
    background-color: rgb(64, 81, 137);
    position: sticky;
}
.dashboard{
    width: 85%;
    /* min-height: 100vh; */
    background-color: white;
    margin-left: 12px;
}
.gender{
margin-left: 11px;
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
      <div class="container" style="margin-left: 0px;">
        <div class="text-start my-3">
          <h1>Student's Record:</h1>
        </div>
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <!-- <th scope="col">Hobbies</th> -->
              <!-- <th scope="col">Password</th> -->
              <!-- <th scope="col">DoB</th> -->
              <!-- <th scope="col">Address</th> -->
              <!-- <th scope="col">Number</th> -->
              <th scope="col" id="action">Action</th> 
            </tr>
          </thead>
           <tbody>
            <?php
                $sql = "SELECT * FROM `st_profile`";
                $result = mysqli_query($connect, $sql);
                $id = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $id = $id + 1;

                  // echo "<pre>"; print_r($row['contact']); echo "</pre>";
                  // exit();
                  // $hobbies = str_replace(",","<br>",$row['hobbies']);
                  // <td>".$row['password']."</td>
                  // <td>".$row['dob']."</td>
                  // <td>".$row['address']."</td>
                  // <td>".$hobbies."</td>
                  // <td>".$row['contact']."</td>

                  echo 
                  "<tr>
                  <td>".$id."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['gender']."</td>
                                <td>
                                      <button type='button' class='edit btn btn-sm btn-primary'>
                                      <a href='st_profile_update_html.php?updatepro=".$row['id']."'>Update</a>
                                      </button>
                                      
                                      <button type='button' class='view btn btn-sm btn-success'>
                                      <a href='single_st_profile_view_html.php?viewRecord=".$row['id']."'>view</a> 
                                      </button> 
                                </td>
                        </tr>";
                }
                ?>
          </tbody>
        </table>
        <button class="btn btn-primary my-4"><a href="index_html.php">Add Record</a></button>
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