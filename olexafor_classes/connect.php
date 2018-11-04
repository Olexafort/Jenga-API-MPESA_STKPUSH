<?php

/**
* @author Olel Nash
*@company Forix
*PHP Class Technologies
*/

class Database 
{

	public $pdo = null;
	//Create class constructor
	function __construct()
	{

		if (!isset($pdo)) {
			
			try {
				$this->pdo = new PDO('mysql:host=localhost; dbname=jenga; ', 'root', '');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				//$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY);

			} catch (PDOException $e) {
				
				echo $e->getMessage();	
			}

			return $this->pdo;
		}

	}

	//Create class destructor
	function __destruct()
	{
		if (isset($pdo)) {

			$this->pdo = null;
		}
	}

}
?>