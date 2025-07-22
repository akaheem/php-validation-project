<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo'
<nav class="navbar navbar-expand-lg bg-primary my-0 py-0" data-bs-theme="dark">
            <div class="container-fluid ">
                <a class=" navbar-brand" href="index_html.php"><img src="../assets/images/crud_logo.png" alt="Crud Logo" height="28"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon bd-primary"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                  <ul class="navbar-nav mb-2 mb-lg-0">';
                  if($loggedin)
                  {
                    echo'
                  <li class="nav-item">
                  <a class="" title="logout" style="border-radius: 100em;" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                  </li>';
                  }
                  echo'
                  <!-- 
                    <li class="nav-item">
                        <a data-toggle="modal" href="#formlogin"
                        style="color: rgb(64, 81, 137);">
                        <i class="fa-solid fa-user-tie"></i>
                        </a>
                        </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Edit</a>
                    </li> -->
                  </ul>
                </div>
              </div>
        </nav>



        <!-- Login Form -->
        <!-- ---------- -->
        <div class="modal fade" id="formlogin" tabindex="-1" role="dialog" aria-labelledby="formloginlongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="img-fluid text-center">
                                <img src="assets/businessman_863430.png" height="200px" alt="LOGIN IMAGE">
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><h6>Email address</h6></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><h6>Password</h6></label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" style="width: 100%;" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!-- Login Form -->
        <!-- ---------- -->';