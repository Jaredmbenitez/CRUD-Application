<?php
function createDB(){

	$servername='localhost';
	$username='root';
	$password='';
	$dbname='holdings';
	$port = '3307';
	//create connection to our database "holdings"
	$con= mysqli_connect($servername,$username,$password,$dbname,$port);

	if(!$con){
		die("Connection Failed: ". mysqli_connect_error());
	}
	//create Database
	$sql= "CREATE DATABASE IF NOT EXISTS $dbname";

	if(mysqli_query($con,$sql)){
		$con = mysqli_connect($servername,$username,$password,$dbname,$port);

		$sql= 'CREATE TABLE IF NOT EXISTS cryptoholdings(
			id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(20) NOT NULL,
			BTC_holdings FLOAT(11) NOT NULL,
			ETH_holdings FLOAT(11) NOT NULL,
			DASH_holdings FLOAT(11) NOT NULL)';
		if(mysqli_query($con,$sql)){
			return $con;}
		else{
			echo "Error In Create Query".   mysqli_error($GLOBALS['con']);
		}
		

	}
	else{
		echo "Error while creating Database...". mysqli_error($con);
	}
}


?>