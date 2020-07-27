<?php
	session_start();
	if(!isset($_SESSION['UserName'])){
		echo "<h3>Please check your mysql user name and password are properly <br /> 
			set in the singUp.php and signIn.php file</h3>";
		echo "<br /><h1>Please <a href=signIn.html>login</a> to enter your home page </h1>";
		exit();
	}
	echo "Welcome $_SESSION[UserName]";
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
</head>
<body>
	
	<h1><br />This is your Home Page</h1>
	<form method="post"> 
        <input type="submit" name="Logout"
                class="button" value="Logout" /> 
    </form> 
	<?php
        if(array_key_exists('Logout', $_POST)) { 
			
            session_destroy();
			header("Location: signIn.html");
			exit();
        }
    ?> 
</body>
</html>
