<?php  

	function connect(){
		try{
			// Database Configuration 
			$servername="localhost";
			$username="root";
			$password = "asd123";
			$dbname="dreamhouse";
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