<?php
session_start();

if(!isset($_SESSION['sess_id']) && $_SESSION['sess_id'] == "") 
{
  header('location:user_login.php');
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>GMA Fund User</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<!-- Bootstrap styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
  
.borders div{
    border-top:1px solid #999;
    border-right:1px solid #999;
    border-bottom:1px solid #999;
}

.borders div:first-child{
    border-left:
    1px solid #999;
}

.borders div > div{
    border:0;
}

</style>
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css">
<script type="text/javascript">
  function checkLogout()
{
    if(confirm("Are you sure you want to logout?"))
        window.location ="./ajax/user_logout.php";
}


function validateChangePwd() {
        if (document.getElementById('profile_change_userpwd').checked) {
            document.getElementById('profile_confirm_userpwd').disabled = false;
            document.getElementById('profile_userpwd').disabled = false;
            document.getElementById('profile_change_userpwd').value = 1;
        } else {
            document.getElementById('profile_confirm_userpwd').disabled = true;
            document.getElementById('profile_userpwd').disabled = true;
            document.getElementById('profile_change_userpwd').value = 0;
        }
    }
</script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="#">GMA FUND</a>-->
            <img src="images/green.png" width="150" height="50">
        </div>
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav navbar-right">
              <?php
                //Profile/Login  Information
                echo "<li><a href='#'> <strong>".$_SESSION['sess_staff_name']."</strong> </a></li>";
                echo "<li><button class='btn btn-info btn-sm' data-toggle='modal' onclick='GetStaffProfile()'>Profile</button>&nbsp</li> ";
                echo "<li><button class='btn btn-danger btn-sm' data-toggle='modal' onclick='return checkLogout();'>Logout</button></li>";
 
                ?>

            </ul>
        </div>


    </div>
</div>
<div class="container">
    <div class="clearfix">
        <div class="pull-left">
            <h1>GMA FUND MEMBER PAGE</h1>
            <h2 class="lead">View/Download Quarterly Statements</h2>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Current Statement</a></li>
    </ul>
    <br>
    <?php
        $statement_filename = "uploads/files/".$_SESSION['sess_staff_id'].".pdf" ;

        if (file_exists($statement_filename)) {
            echo "<div class='alert alert-success' role='alert'><a href='".$statement_filename."' target='_blank'><span class='glyphicon glyphicon-download-alt' aria-hidden='true'> </span> Download Statement</a></div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>No statement uploaded</div>";
        }

    ?>
    
    <!--<blockquote>
        <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.<br>
        Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
        Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
    </blockquote>-->
    <br>

<!-- Content Section -->
<div class="container">

<!--
    <div class="row">
        
        <div class="col-md-3">
            
        </div>

        <div class="col-md-3">
            
        </div>

        <div class="col-md-3 text-right"">
            Welcome XYZ 
        </div>

        <div class="col-md-3 text-right">
            <a href="">Profile </a>| <a href="">Logout</a>
        </div>

    </div>



    <div class="row borders">
        <div class="col-md-12">
            <h3>Medical Fund User Management</h3>
        </div>
    </div>-->
  <hr>

<!-- /Content Section -->

    <div class="row">
        <div class="col-md-12">

            <div class="get_announcement_content"></div>
        </div>
    </div>
<!--
<div class="jumbotron">
  <h2 class="display-1">Hello, world!</h2>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>-->

    
  
    


</div>
  



<!-- Modal - Update User details -->
<div class="modal fade" id="update_staffprofile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Profile</h4>
            </div>
            <div class="modal-body">

               <div class="form-group">
                      <label for="profile_staff_id">Staff ID</label>
                      <input type="text" class="form-control" id="profile_staff_id"  disabled="disabled"  placeholder="Staff ID">
                  </div>


                  <div class="form-group">
                      <label for="profile_userpwd">Change Password?</label>
                      <input type="checkbox" onclick="validateChangePwd()" class="form-check-input" id="profile_change_userpwd"  value="0">
                  </div>
                  <div class="form-group">
                      <label for="profile_userpwd">Password</label>
                      <input type="password" class="form-control" id="profile_userpwd"  disabled="disabled" placeholder="Password">
                  </div>

                  <div class="form-group">
                      <label for="profile_confirm_userpwd">Confirm Password</label>
                      <input type="password" class="form-control" id="profile_confirm_userpwd"  disabled="disabled" placeholder="Confirm Password">
                  </div>


                  <div class="form-group">
                      <label for="profile_first_name">First Name</label>
                      <input type="text" class="form-control" id="profile_first_name" placeholder="First Name">
                  </div>

                  <div class="form-group">
                       <label for="profile_last_name">Last Name</label>
                        <input type="text" class="form-control" id="profile_last_name" placeholder="Last Name">
                  </div>

                  <div class="form-group">
                      <label for="profile_email_address">Email Address</label>
                      <input type="email" class="form-control" id="profile_email_address" placeholder="Email Address">

                  </div>


                  <div class="form-group">
                      <label for="profile_mobile_number">Mobile Number</label>
                      <input type="text" class="form-control" id="profile_mobile_number" placeholder="Mobile Number">
                  </div>

   

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateStaffProfile()" >Save Changes</button>
                <input type="hidden" id="hidden_staff_id">
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
  
 $(document).ready(function () {
    // READ records on page load
    getCurrentAnnouncements(); // calling function
});
</script>
</body>
</html>