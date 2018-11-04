<?php
include_once('../olexafor_classes/connect.php');
include_once('../olexafor_classes/Accounts.Classes.php');

$user = new Accounts();

if (isset($_POST['login']) && !empty($_POST['login'])) {

    $account = $user->security($_POST['user']);
    $password = $user->security($_POST['password']);

    if (!empty($user)) {
        try {
            #echo $account . " " . $password;
            $user->userLogin($account, $password);
            
        } catch (PDOException $e) {
            header("Location: 504.php?error=" . $e->getMessage());
        }
    }else{
        echo "Fields Can not be empty";
    }
}


?>