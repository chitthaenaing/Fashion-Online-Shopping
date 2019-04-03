<?php  

	function connect(){
		try{
			// Database Configuration 
			$servername="us-cdbr-iron-east-03.cleardb.net";
			$username="bd50d688d356ba";
			$password = "2da6c929";
			$dbname="heroku_3baa2dea8c27f55";
	 	 	$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	 	 	return $conn;
		}catch(PDOException $e){
	  		$e->getMessage();
	  		echo 'Could not connect to the Database';
		}
	}

	function get($query,$conn){
		try{
			$stmt = $conn->prepare($query);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			$e->getMessage();
		}
	}


	function insert($query,$binding,$conn){
		try{
			$stmt = $conn->prepare($query);
			return $stmt->execute($binding);
		}catch(PDOException $e){
			$e->getMessage();
		}
	}
?>