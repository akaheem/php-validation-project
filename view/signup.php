<?php
    include '../config/dataConnection.php';
    $registeraationSuccess = false;
    $existingName          = false;
    if (isset($_POST['submit']))
    {
        // echo"<pre>"; print_r($_POST); echo"</pre>";
        
        $name         = $_POST['name'];
        $password     = $_POST['password'];
        
        // echo $name."<br>";
        // echo $password."<br>";

        $oldNameQuery     = "Select * from `signup` where `name`='$name'";
        $result           = mysqli_query($connect, $oldNameQuery);
        $checkRow         = mysqli_num_rows($result);
        if($checkRow > 0){
            $existingName = true;
            // header ("Location: login.php");
        }
        else{

            
            $sql = "INSERT INTO `signup` (`name`, `password`, `date`) VALUES ('$name', '$password', NOW());";
            // echo $sql."<br>";
            // die();
            
            $result = mysqli_query($connect, $sql);
            if(!$result){
                die(mysqli_error($connect));
            }
            else
            {
                // echo "success";
                // header ('location: login.php');
                $registeraationSuccess = true;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link   rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- <link   rel="stylesheet" href="../assets/css/login.css"> -->
    <link   rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>

    <style>
        form{
        display: flex ;
        flex-direction: column;
        align-items: center;
    }
    </style>
</head>
<body>
<div class="contain">
<div class="main">
        <?php
                if($existingName){
                    echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> Crossponding Error! </strong> This username is already Registered; you can login here <a href="login.php">Login</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>
                
        <?php
                if($registeraationSuccess){
                    echo'
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registered Successfully!</strong> Now you can login here <a href="login.php">Login</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>

    <div class="container mt-4">
        <div class="text-center">
            <h2>Sign-up Your Self</h2>
        </div>
            <form method="post" class="my-5">

                <div class="form-group mb-3 col-md-4">
                    <label>User Name</label>
                    <input type="email" class="form-control col-md-3" id="name" name="name" value="" placeholder="enter your Email..." >
                </div>

                <div class="form-group mb-3 col-md-4">
                    <label>Password</label>
                    <input type="password" class="form-control col-md-4" id="password" name="password" value="" placeholder="enter your Password...">
                </div>

            <div class="text-end">
                <button class="btn btn-primary " name="submit" type="submit" >Submit</button>
                <!-- <a class="btn btn-primary" href="login.php">Login</a> -->
            </div>

            </form>
    </div>
</div>
</div>
    

</body>
</html>