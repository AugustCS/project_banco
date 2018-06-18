<?php 
	$host = "localhost";
	$user = "root";
	$pass = "recovery";

	try {
		$conexion = new PDO("mysql:host=".$host.";dbname=transacciones",$user,$pass);
	} catch (PDOException $e) {
		print "Error".$e -> getmessage();
	}finally{
		return $conexion;
	}

		


 ?>