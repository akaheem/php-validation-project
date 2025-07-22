<?php
include '../config/dataConnection.php';

// starting the session for login page
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true )
// echo  "<pre>"; print_r($_SESSION['loggedin']);echo  "</pre>";
// die();
{ 
  header ("Location: login.php");
  die();
}

if (isset($_GET['viewRecord'])) {
    $id = mysqli_real_escape_string($connect, $_GET['viewRecord']);

    // SQL query to fetch student details along with aggregated courses and subjects
    $sql = "SELECT p.id,p.name,p.email, p.contact,p.dob,p.gender,
                   GROUP_CONCAT(DISTINCT c.course_title) AS course_titles,
                   GROUP_CONCAT(DISTINCT s.subject_title SEPARATOR ',') AS subject_titles
                   FROM st_profile p
                   INNER JOIN courses c ON FIND_IN_SET(c.cid, p.courses) > 0
                   INNER JOIN subjects s ON FIND_IN_SET(s.sid, p.subjects) > 0
                   WHERE p.id = $id";

    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("Error fetching data: " . mysqli_error($connect));
    }

    $row = mysqli_fetch_assoc($result);

    $subjects = str_replace(',', '<br>', $row['subject_titles']);
    } 
    else {
    die('error');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="contain">
        <!-- NAV-BAR -->
        <?php include 'navbar.php'; ?>
        <!-- NAV-BAR -->

        <!-- MAIN -->
        <div class="main">
            <!-- SIDE-BAR -->
            <?php include 'sidebar.php'; ?>
            <!-- SIDE-BAR -->

            <!-- TABLES -->
            <div class="container viewTable" style="margin-left: 0px;">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DoB</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Courses</th>
                            <th scope="col">Subjects</th>
                            <th scope="col" id="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo  ($row['id']); ?></td>
                            <td><?php echo  ($row['name']); ?></td>
                            <td><?php echo  ($row['email']); ?></td>
                            <td><?php echo  ($row['gender']); ?></td>
                            <td><?php echo  ($row['dob']); ?></td>
                            <td><?php echo  ($row['contact']); ?></td>
                            <td><?php echo  ($row['course_titles']); ?></td>
                            <td><?php echo  $subjects; ?></td> 
                            <td>
                                <button type='button' class='edit btn btn-sm btn-primary'>
                                    <a href='st_profile_update_html.php?updatepro=<?php echo  ($row['id']); ?>'>Update</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <button class="btn btn-primary my-4">
                        <a href="index_html.php">Add Record</a>
                    </button>
                </table>
            </div>
            <!-- TABLES -->
        </div>
        <!-- MAIN -->

        <!-- FOOTER -->
        <!-- FOOTER -->
    </div>
</body>
</html>
