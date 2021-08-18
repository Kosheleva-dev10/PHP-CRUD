<htmL>
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/ulogin.js"></script>
  <title>User Login</title>

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<style>
.post-title { font-size:20px; }
.mtb-margin-top { margin-top: 20px; }
.top-margin { border-bottom:2px solid #ccc; margin-bottom:20px; display:block; font-size:1.3rem; line-height:1.7rem;}

.form-check-label {
  background-image:url(images/error.png);
  background-position:left;
  background-repeat:no-repeat;
  padding-left:1.5rem;
}
.btn-success {
  cursor:pointer;
}
</style>
</head>
<body>

  <div class="container">
        <form class="form-horizontal" method="POST" id="login_form">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <center><img src="images/green.png"></center>
                    <h2>GMA Fund User Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"><img src="img/username.png" width="20" /></i></div>
                            <input type="text" name="staff_id" class="form-control" id="staff_id" placeholder="Staff ID" autocomplete="off" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"><img src="img/password.png" width="20" /></i></div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success" value="Login">
          <label class="form-check-label">
            <span class="text-danger align-middle" id="errorMsg"></span>
          </label>
                </div>
            </div>
        </form>
    </div>

  </body>
</htmL>