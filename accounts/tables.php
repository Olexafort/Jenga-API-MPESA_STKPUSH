<?php

include_once('../olexafor_classes/connect.php');

class Tables extends Database
{

	function __construct()
	{
		parent::__construct();
	}

	public function user_table()
	{
		$stmt = "CREATE TABLE IF NOT EXISTS accounts_db (
			ACCOUNT_ID INT(11) NOT NULL AUTO_INCREMENT,
			USERNAME VARCHAR(100) DEFAULT NULL,
			PASSWORD VARCHAR(250) DEFAULT NULL,
			EMAIL VARCHAR(100) DEFAULT NULL,
			PRIMARY KEY (ACCOUNT_ID))";

		$table = $this->pdo->prepare($stmt);

		try {
			$table->execute();
		} catch (PDOException $e) {
			header("Location: 504.php?error=" . $e->getMessage());
		}
	}
}

$fox = new Tables();
$fox->user_table();

?>