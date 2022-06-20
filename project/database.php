<?php 
	class database{
		public $host 				=	 'localhost';
		public $username		=	 'root';
		public $database 		=	 'user';
		public $password 		=	 '';
		public $usr;

		public function __construct(){
			try{
				//("mysql:host=hostname;dbname=dbname", username, password)
				$this->usr = new PDO("mysql:host=".$this->host.";dbname=".$this->database."", $this->username, $this->password);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
 ?>