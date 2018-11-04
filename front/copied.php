<!-- <?php
 if (isset($_GET['check'])) {
   

$email = ((isset($_POST['Email']))?sanitize($_POST['Email']):'');
$email = trim($email);
$password = ((isset($_POST['Password']))?sanitize($_POST['Password']):'');
    
    $errors = array();

    if ($_POST) {
        if (empty($_POST['Email']) || empty($_POST['Password'])) {
            $errors[] = 'You Must provide email and password';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'You must enter a valid email';
        }
        if (strlen($password) < 6) {
            $errors[] = 'Password must be more than 6 characters';
        }


        $query = $db->query("SELECT * FROM signup WHERE email = '$email'");
        $user = mysqli_fetch_assoc($query);
        $userCount = mysqli_num_rows($query);

        $passworduser = $user['password'];
        if ($userCount < 1) {
            $errors[] = 'That email does not exist in our database';
        }

       if (!password_verify($password, $passworduser)) {
           $errors[] = 'That password does match our records please try again';
       }

        if (!empty($errors)) {
            echo display_errors($errors);
        }
        else{

            $user_id = $user['id'];
            login($user_id);
        }
    }
  }

?>

<?php 
   

    if (isset($_GET['add'])) {
            $email = $_POST['email'];
            $username = $_POST['username']
            $password = $_POST['password'];
            $pwd = $_POST['pwd'];

            $errors = array();

    if ($_POST) {
                $emailQuery = $db->query("SELECT * FROM signup WHERE email = '$email'");
                $emailCount = mysqli_num_rows($emailQuery);

                if ($emailCount !=0) {
                    $errors[] = 'The email you have entered already exists!';
                }
                $required = array('username');
                foreach ($required as $b) {
                    if (empty($_POST[$b])) {
                        $errors[] = 'Kindly fill all the required Fields';
                        break;
                    }
                }


                if (strlen($password) <6){
                    $errors[] = 'Password must be more than 6 characters';
                }

                if ($pwd!=$password) {
                    $errors[] = 'Your Password does not match';
                }
                if (!empty($errors)) {
                    echo display_errors($errors);
                }

                else{
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO signup (email, username, password, ) VALUES ('$email','$username','$hashed')"; 

            $db->query($sql) or die (mysqli_error($db));
           
           $_SESSION['success_flash'] = 'Client Successfully added!';

            header('Location: login.php');
        }

        }


    }
 ?> -->
