<?php
include_once('../olexafor_classes/connect.php');
include_once('../olexafor_classes/Accounts.Classes.php');

$user = new Accounts();

if (isset($_POST['register']) && !empty($_POST['register'])) {
    
    $username = $user->security($_POST['username']);
    $email = $user->security($_POST['email']);
    $password = $user->security($_POST['password']);
    $con = $user->security($_POST['confirm_password']);

    if ($password == $con) {
        $val = $username . " " . $email . " " . $password;

        $user->createAccount($username, $email, $password);
    }else{
        $error = "Passwords do not match";
        header("Location: index.php?error=" . $error);
    }
}

if (isset($_POST['login'])) {
    $user = $user->security($_POST['user']);
    $password = $user->security($_POST['password']);

    if (!empty($user)) {
        $user->userLogin($account, $password);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Jenga API Group 4</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/jenga-login.css" />
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="login.php">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span id="mail_error"></span>
                            <span class="add-on"><i class="icon-user"></i></span><input id="email" name="user" type="text" placeholder="Enter E-mail" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input id="pwd" name="password" type="password" placeholder="Enter Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                           <input class="btn btn-success" name="login" type="submit" value="Login" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Register</a></span>
                </div>
            </form>
            <form id="recoverform" method="POST" action="index.php" class="form-vertical" enctype="multipart/form-data">
                <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
				<h3 style="text-align: center; color: orange;">User Registration</h3>
				
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" placeholder="E-mail address" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="confirm_password" placeholder="Confirm Password" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="submit" class="btn btn-info" name="register" value="register" />
                        </div>
                    </div>
                </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/jenga.login.js"></script>
        <script>
            $(document).ready(function(){

                
                var checkpass = $('#pwd').val();

                function validate()
                {
                    var checkmail = $('#email').val();

                    if (checkmail == '') {
                        $('#mail_error').html("Field can not be empty");
                    }
                }
                
            })
        </script> 
    </body>

</html>
