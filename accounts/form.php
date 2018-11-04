<?php

/*if (isset($_POST['submit'])) {
	$ussr = $_POST['username'];
	$mail = $_POST['email'];
	$pass = $_POST['password'];

	echo $ussr;

}*/

include_once('../olexafor_classes/Accounts.Classes.php');

$user = new Accounts();

if (isset($_POST['submit'])) {
    
    $ussr = $user->security($_POST['username']);
    $mail = $user->security($_POST['email']);
    $pass = $user->security($_POST['password']);
    $con = $user->security($_POST['confirm_password']);

    /*if ($password == $con) {
        try {
            #header("Location: 504.php?error=" . $username . " " . $email);
            $user->createAccount($username, $email, $password);
        } catch (PDOException $e) {
            header("Location: 504.php?error=" . $e->getMessage());
        }
        
    }else{
        $error = "Passwords do not match";
        header("Location: index.php?error=" . $error);
    }*/

    echo $ussr;
}


?>
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form method="POST" action="form.php">
		<input type="text" name="username" placeholder="Enter Username"><br><br>
		<input type="email" name="email" placeholder="Enter Email"><br><br>
		<input type="password" name="password" placeholder="Enter Password"><br><br>
		<input type="password" name="confirm_password" placeholder="Re-Enter Password"><br><br>
		<input type="submit" name="submit" value="Register">
	</form>
</body>
</html>