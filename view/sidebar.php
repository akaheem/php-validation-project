<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
} 
echo'
<div class="sidebar">
            <div class="row flex-nowrap">
                <div class="px-0">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">';
                        if($loggedin){
                            echo'
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="index_html.php" class="nav-link align-middle px-0 text-white">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="add_course_html.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                    <span class="ms-1 d-none d-sm-inline">Add Courses</span> </a>
                            </li>
                            <li>
                                <a href="add_subject_html.php" class="nav-link px-0 align-middle text-white">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Add Subjects</span></a>
                            </li>
                            <li>
                                <a href="st_profile_view_html.php" class="nav-link px-0 align-middle text-white">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">All Records</span></a>
                            </li>';
                        }
                        else{
                            echo'
                            <li style="list-style: none;">
                                <a href="login.php" class="nav-link px-0 align-middle text-white">
                                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Login</span></a>
                            </li>';
                        }
                        echo'
                        </ul>
                    </div>
                </div>
            </div>
        </div>';