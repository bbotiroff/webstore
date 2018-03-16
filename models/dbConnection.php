<?php 

class DBconnection{

	private $serverName = dbServerName;
	private $dbName = dbName;
	private $userName = dbUserName;
	private $password = dbUserPass;


	protected function connect(){
		$dbDetail =  "mysql:host=" . $this->serverName . ";dbname=" . $this->dbName;



		try
		{
			//connection to database
			$db = new PDO($dbDetail,$this->userName, $this->password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		catch(PDOException $e)
		{
			print "Couldn't connect to the database: " . $e->getMessage();
		}

	}



}


