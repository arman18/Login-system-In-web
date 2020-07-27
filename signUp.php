<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "BSSE1029";
	// create connection
	$conn = mysqli_connect($servername,$username,$password);
	if(!$conn){
		die("Connection failed : " . mysqli_connect_error());
	}
	//Create database
	
	$sql = "create database ".$dbname;
	mysqli_query($conn,$sql);
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){
		die("Connection failed : " . mysqli_connect_error());
	}
	// create table 
	$sql = "create table info
	(
		UserName varchar(15),
		Password varchar(15)
	)";
	mysqli_query($conn,$sql);
// insert values
	if(!(isset($_GET["UserName"]) and isset($_GET["Password"]))){
		echo "Fill all fields";
		header("Location: home.php");
		exit();
	}
	if(!(preg_match('/^[a-zA-Z0-9]{4,}$/', $_GET["UserName"]))) {
		echo "UserName is not valid <br />";
		echo "UserName should alphanumeric & longer than or equals 4 chars";
		exit();
	}
	if($_GET["Password"]!=$_GET["rePassowrd"]){
		echo "Password mismatched";
		exit();
	}
	$sql = "select * from info where UserName = '$_GET[UserName]'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	if($row>0){
		echo "username already exist";
		exit();
	}
	$sql = "INSERT INTO info(
		UserName,Password)
		VALUES('$_GET[UserName]','$_GET[Password]')";
		
	if(!mysqli_query($conn,$sql)){
		echo "Something error try again";
		exit();
	}
	session_start();
	$_SESSION['UserName'] = $_GET['UserName'];
	header("Location: home.php");
	exit();
	
?>