<?php
    session_start();
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>
<body>
<?php

    require_once 'db.php';
    $table = 'students';

    if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM $table WHERE username = '$username'";
        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == $password ){

                if($row['status'] == 'active'){
                    $_SESSION['students_login'] = $username;
                    header('location: index.php');    
                }else{
                    $_SESSION['sign_error'] = "your account is watch mode and will be activate within 24hr";
                }
                
            }else{
                $_SESSION['sign_error'] = "password incorrect";
            }
        }else{
            $_SESSION['sign_error'] = "username incorrect";
        }
    }
?>

<div class="wrap">
    <div class="page-body animated slideInDown">
        <div class="logo text-center">
           <h1>Students login</h1>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">

                <?php
                    if(isset($_SESSION['sign_error'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['sign_error']."</div>";
                        unset($_SESSION['sign_error']);
                    }
                ?>

                    <form action="sign-in.php" method="POST">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" id="email" placeholder="Username">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign in" name="signin" class="btn btn-primary btn-block" >
                        </div>
                        <div class="form-group text-center">
                            <a href="#">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
