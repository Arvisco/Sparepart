<!DOCTYPE html>
<?php
include '../core.php';
session_start();
error_reporting(0);
ini_set('display_errors', 0);

if ($_GET['code'] == 'logout') {
    session_unset();
    session_destroy();
} else {
};
?>

<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Restricted Area</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body  id="large-header" class="large-header">  
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-headers">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-floating mb-3">
                                            <input name="email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="pword" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                    <?php
                                        if (isset($_POST['login'])) {
                                            $email = $_POST['email'];
                                            $pword = $_POST['pword'];
                                            if ($email != 'admin@admin' && $pword != 'admins') {
                                                echo "
                                                <center><h6>INVALID ADMIN ACCOUNT </h6></center>
                                                ";
                                            } else {
                                                $_SESSION['role'] = 'admin';
                                                header('Location:index.php');
                                            }
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
            <!-- <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
            </div> -->
            <canvas id="demo-canvas">  </canvas>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <link href='https://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
            <link rel='stylesheet' href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="css/style.css">
            <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
            <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
            <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script>
            <script src="script.js"></script>
            
            
            
            
        </body>
    </div>
    
    </html>