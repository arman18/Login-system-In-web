<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "BSSE1029";
	$conn = mysqli_connect($servername,$username,$password);
	if(!$conn){
		die("Connection failed : " . mysqli_connect_error());
	}
	//Create database (it is needed for new mechine and first time here not signup.html)
	
	$sql = "create database ".$dbname;
	mysqli_query($conn,$sql);
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){
		die("Connection failed : " . mysqli_connect_error());
	}
	// create table (it is needed for new mechine and first time here not signup.html)
	$sql = "create table info
	(
		UserName varchar(15),
		Password varchar(15)
	)";
	mysqli_query($conn,$sql);
	if(!(isset($_GET["UserName"]) and isset($_GET["Password"]))){
		echo "Fill all fields";
		header("Location: home.php");
		exit();
	}
	$sql = "select * from info where UserName = '$_GET[UserName]' and Password = '$_GET[Password]'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)<1){
		echo "invalid username or password";
		exit();
	}
	session_start();
	$_SESSION['UserName'] = $_GET['UserName'];
	header("Location: home.php");
	exit();
?>