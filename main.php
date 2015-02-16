		<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
<html>
	<head>
		<title>Main Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<?php require_once("login_function.php");
			require_once('chat_function.php');?>
	</head>
	
	<body id="body-color">
		<?php
		//var_dump($_POST);
		//Logout
		
		if(isset($_POST['logout']))
		{
			logoutUser();
		}
		//check if there is a login and login user and write session variable
		if(isset($_POST['myusername']) && isset($_POST['mypassword']))
		{	
			if(checkLogin($_POST['myusername'], $_POST['mypassword']))
			{
				echo "Login successful";	
			} 
			else 
			{
				echo "Wrong Username or Password";
			}
		}
		
		// if there is no data in session or in post print login 
		if(empty($_SESSION['myusername']))
		{
			printLogin();
		}
		else
		{
			printUserDescription($_SESSION['myusername']); //user is logged on!
			printChat();
			
			if(isset($_POST['tf_input']))
			{
				saveMessage($_SESSION['myusername'], $_POST['tf_input']);
			}
		}
		
		
		
		
		
		//var_dump($_SESSION['myusername']);
		?>
		<!--	<iframe scrolling="yes" class="myframe" src="login.php" frameborder="0"></iframe> //not working with IFrame because everything will be handled in new frame as well-->
		<script> 
		  setInterval(function(){
			loadXMLDoc()
		},1000); 
		</script>
	</body>
</html>
