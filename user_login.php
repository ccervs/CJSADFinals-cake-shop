<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 1) {
    echo "<script>alert('Username or Password does not exist! Sign up to Continue.')</script>";
    echo "<script>window.location.assign('user_login.php')</script>";
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><h2 class="text-danger">Sweet & Delices Cake Shop</h2></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form id="form" data-parsley-validate="" method="post" action="user_logincheck.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password" name="user_password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 text-center">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="user_register.php" class="footer-link">Sign up</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/parsley.js"></script>
    <script>
    $('#form').parsley();
    </script>
</body>
</html>