<?php
include_once('../olexafor_classes/Accounts.Classes.php');

$user = new Accounts();

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    
    $username = $user->security($_POST['username']);
    $password = $user->security($_POST['password']);

    if (!empty($username)) {
        $user->userLogin($account, $password);
    }else{
        $error = "Fields can not be empty";
        header("Location: index.php?error=" . $error);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form by Tooplate</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="login">
    <div class="container">
        <div class="row tm-register-row tm-mb-35">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-l">
                <form action="login.php" method="POST" class="tm-bg-black p-5 h-100">
                    <div class="input-field">
                        <input placeholder="Username" id="username" name="username" type="text">
                    </div>
                    <div class="input-field mb-5">
                        <input placeholder="Password" id="password" name="password" type="password">
                    </div>
                    <div class="tm-flex-lr">
                        <a href="#" class="white-text small">Forgot Password?</a>
                        <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-r">
                <header class="font-weight-light tm-bg-black p-5 h-100">
                    <h3 class="mt-0 text-white font-weight-light">Your Login</h3>
                    <p>Login to your account to start your transactions.</p>
                    <p class="mb-0">By signing in, you accept the terms and conditions of this service.</p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ml-auto mr-0 text-center">
                <a href="index.php" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">Create New Account</a>
            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12 text-center">
                <p class="d-inline-block tm-bg-black white-text py-2 tm-px-5">
                    Copyright &copy; 2018 Group 4 
                    
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>