<?php
include_once('../olexafor_classes/Accounts.Classes.php');

$user = new Accounts();

if (isset($_POST['submit'])) {
    
    $username = $user->security($_POST['username']);
    $email = $user->security($_POST['email']);
    $password = $user->security($_POST['password']);
    $con = $user->security($_POST['confirm_password']);

    if (!empty($password)) {
        try {
            header("Location: 504.php?error=" . $username . " " . $email . " " . $password);
            #$user->createAccount($username, $email, $password);
        } catch (PDOException $e) {
            header("Location: 504.php?error=" . $e->getMessage());
        }
        
    }else{
        $error = "Passwords do not match";
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
    <title>Jenga API Group 4</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="register">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <header class="mb-5">
                    <h3 class="mt-0 white-text">Sign-up Form</h3>
                    <p class="grey-text mb-4">Sign Up and enjoy using Jenga API resources and modules by Group 4.</p>
                    <p class="grey-text">By signing up you agree to our terms of services.
                    </p>
                </header>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form action="index.php" method="POST" class="tm-signup-form">
                    <div class="input-field">
                        <input placeholder="Username" id="username" name="username" type="text">
                    </div>
                    <div class="input-field">
                        <input placeholder="Email" id="email" name="email" type="email">
                    </div>
                    <div class="input-field">
                        <input placeholder="Password" id="password" name="password" type="password">
                    </div>
                    
                    <div class="input-field">
                        <input class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0" type="submit" name="submit" value="Sign Up">
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" name="submit" class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12">
                <p class="text-center grey-text text-lighten-2 tm-footer-text-small">
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