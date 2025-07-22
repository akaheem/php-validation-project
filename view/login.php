<?php
    include '../config/dataConnection.php';

    $accessError = false;
    $existingName = false;
    $existingPassword = false;
    if (isset($_POST['submit']))
    {
    
        // echo"<pre>"; print_r($_POST); echo"</pre>";
        
        // $id           = $_POST['id'];
        $name         = $_POST['name'];
        $password     = $_POST['password'];
        
        // echo $name."<br>";
        // echo $password."<br>";
        // die();
        $oldNameQuery = "Select * from `signup` where `name`='$name'";
        $result = mysqli_query($connect, $oldNameQuery);
        $checkRow     = mysqli_num_rows($result);
        if($checkRow != 1){
            $existingName = true;
            // header ("Location: login.php");
        }
        else{
            // $existingName = false;
            
            $sql = "Select * from `signup` where `name`='$name' AND `password`='$password'";
            // echo $sql."<br>";
            
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
            // echo $row."<br>";
        // die();

        if($row == 1){
            // echo "success";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $name;
            // echo  "<pre>"; print_r($_SESSION);echo  "</pre>";
            // die();
            header ("Location: index_html.php");
        }
        else
        {
            $accessError = true;
            // echo "Access Denied.";
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>

    <link   rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link   rel="stylesheet" href="../assets/css/login.css">
    <link   rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>



    <style>
        
    body{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .main{
        width: 100%;
        display: flex;
        flex-direction: row; 
    }
    form{
        width: 100%;
        display: flex ;
        flex-direction: column;
        align-items: center;
    }
    a{
        text-decoration: none;
        color:cadetblue;

    }
    a:hover{
        color: blue;
    }
    </style>
</head>

<body>
    
    <?php
        if($existingName){
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Security Alert!</strong> Access Denied. This username is not Registered; go and register your self at <a href="signup.php">registeration</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
            <?php
            if($accessError){
                echo'
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Security Alert!</strong> Access Denied. Your entered password is not correct.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
                ?>

    <div class="contain">
        <div class="main">


            <!-- DASHBOARD -->
            <!-- --------- --> 
                <!-- <div class="card w-50  ">  -->
                    <div class="container my-3">
                        <div class="text-center my-3">
                            <h2>Login To Crud</h2>
                        </div>
                            <form method="post" class="mt-3 p-0 m-0">
    
                                <div class="form-group mb-3 col-md-4">
                                    <label>User Name</label>
                                    <input type="email" class="form-control col-md-3" id="name" name="name" value="" placeholder="enter your Email..." >
                                </div>
    
                                <div class="form-group mb-3 col-md-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control col-md-4" id="password" name="password" value="" placeholder="enter your Password...">
                                </div>
    
                                <div class="text-start col-md-4">
                                    <p class="text-start">Did'nt have an account? <a style="color: rgb(13, 110, 253);" href="signup.php">sign-up</a></p>
                                </div>
    
                                <div class="text-center col-md-4">
                                    <button class="btn btn-primary " name="submit" type="submit" >Submit</button>
                                    <!-- <a class="btn btn-primary" href="signup.php">Sign-up</a>. -->
                                </div>
    
                            </form>
                    </div> 
                </div> 
        </div>
    </div>    




</body>
</html>