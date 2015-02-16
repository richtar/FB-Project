<!DOCTYPE HTML>
<html>
	<head>
		<title>Connectivity sign up</title>
		<?php

			define('DB_HOST', 'localhost');
			define('DB_NAME', 'fb-projekt');
			define('DB_USER','root');
			define('DB_PASSWORD','');

			$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
			$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				die();
			}
			/*else
			{
				echo "Successfully connected to your database";
			}*/

			function NewUser()
			{
				$fullname = $_POST['name'];
				$userName = $_POST['user'];
				$email = $_POST['email'];
				$password =  $_POST['pass'];
				$query = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
				$data = mysql_query ($query)or die(mysql_error());
				if($data)
				{
					//echo "header('refresh: 4;url=main.php')";
					echo "Your registration is now complete.";
					echo " You will be redirected back to main page.";
					echo "<script>setTimeout(function(){window.location.href='main.php'},4000);</script>"; //javascript used because php isn't working
				}
			}
			function SignUp()
			{
				if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
				{
					$result = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]'") or die(mysql_error());
					if(mysql_num_rows($result) > 0)
					{
						echo "This user is already registered, please ";
						echo "<a href='sign_up.php'>try again.</a>";
						echo " or return to ";
						echo "<a href='main.php'>main page.</a>";
					} 
					else
					{
						NewUser();
					}
				}
			}
			if(isset($_POST['submit']))
			{
				SignUp();
			}
		?>

	</head>
	<body id="body-color">
	</body>
</html>
