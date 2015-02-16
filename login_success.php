		<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Successful</title>

		<!-- Check if session is not registered, redirect back to main page.
		Put this code in first line of web page. -->

		<?php
			//var_dump($_SESSION);

			if(isset($_SESSION['myusername']))
			{
				$loginmessage = "Login Successful. User:" .  $_SESSION['myusername'];
				echo "<br>";
				echo " You will be redirected back to main page.";
				header('refresh: 4;url=main.php');
			}
			else
			{
				$loginmessage = "Internal Session error.";
			}
		?>
	</head>
	<body>
		<?php echo $loginmessage; ?>
	</body>
</html>
