<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="style.css">

		<?php
			define('DB_HOST', 'localhost');
			define('DB_NAME', 'fb-projekt');
			define('DB_USER','root');
			define('DB_PASSWORD','');

			$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
			$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
		?>

	</head>
	<body id="body-color">
		<div id="Sign_Up">
		<fieldset style="width:50%"><legend><h1>Account registration</h1></legend>
			<table border="0">
				<tr>
					<form method="POST" action="connectivity_sign_up.php">
					<td>Name</td><td> <input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Email</td><td> <input type="text" name="email"></td>
				</tr>
				<tr>
					<td>UserName</td><td> <input type="text" name="user"></td>
				</tr>
				<tr>
					<td>Password</td><td> <input type="password" name="pass"></td>
				</tr>
				<tr>
					<td>Confirm Password </td><td><input type="password" name="cpass"></td>
				</tr>
				<tr>
					<td><input id="button" type="submit" name="submit" value="Sign up"></td>
				</tr>
					</form>
			</table>
		</fieldset>
		</div>
	</body>
</html>
