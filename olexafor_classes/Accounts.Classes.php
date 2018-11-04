<?php
session_start();
include_once('connect.php');

class Accounts extends Database{

	function __construct()
	{
		parent::__construct();
	}

	public function security($var)
	{
		return $var;
	}

	public function createAccount($username, $email, $password)
	{
		$check_stmt = "SELECT * FROM accounts_db WHERE EMAIL = :email";
		$query = $this->pdo->prepare($check_stmt);

		try {

			$query->execute(array(":email" => $email));

			$results = $query->rowCount();

			if ($results > 0) {

				$error = "This account has already been registered";
			}else{
				$insert_stmt = "INSERT INTO accounts_db (USERNAME, EMAIL, PASSWORD) VALUES (:username, :email, :password)";
				$prepare_insert = $this->pdo->prepare($insert_stmt);

				try {
					$insert_array = array(":username" => $username ,
				                          ":email" => $email ,
				                          ":password" => md5($password));

					$prepare_insert->execute($insert_array);
					
					header("Location: index.php#");

				} catch (PDOException $e) {
					$error = "Account could not be created";
					header("Location: 504.php?error=" . $e->getMessage());
				}
			}
		} catch (PDOException $e) {
			header("Location: 504.php?error=" . $e->getMessage());
		}
	}

	public function userLogin($account, $password)
	{
		$check_details = "SELECT * FROM accounts_db WHERE EMAIL = :account";
		$prepare_check = $this->pdo->prepare($check_details);

		try {
			$my_array = array(":account" => $account);

			$prepare_check->execute(array(":account" => $account));
            $rows = $prepare_check->rowCount();

            if ($rows > 0) {
            	while ($val = $prepare_check->fetch(PDO::FETCH_ASSOC)) {

            		$user_password = $val['PASSWORD'];

            		if ($user_password == md5($password)) {

            			$_SESSION['user_id'] = $val['USER_ID'];
            			$_SESSION['username'] = $val['USERNAME'];
            			$_SESSION['session_start'] = Date('G:i:s a');

            			header("Location: ../front/panel.php");
            		}else{
            			$error = "Wrong Password";
            		}
            	}
            }else{
            	$error = "User not registered";
            	header("Location: signup.php?error=" . $error);
            }
		} catch (PDOException $e) {
			header("Location: 504.php?error=" . $e->getMessage());
		}
	}

	function __destruct()
	{
		parent::__destruct();
	}

	public function logout()
	{
		session_destroy('user_id');
		session_destroy('username');

		header("Location: index.php");
	}
}

?>