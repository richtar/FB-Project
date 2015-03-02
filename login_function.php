	<?php

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'fb-projekt');
	define('DB_USER','root');
	define('DB_PASSWORD','');

	function printLogin()
	{
		
		echo'
		
		<fieldset style="width:30%" align="center"><legend><h3>Login</h3></legend>
			<table border="0">
				<tr>
					<form method="POST" action="main.php">
					<td width="78">Username</td><td><input type="text" name="myusername" id="myusername"></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" name="mypassword" id="mypassword"></td>
				</tr>
				<tr>
					<td><input id="button" type="submit" name="Submit" value="Login"></td>
				</tr>
				</table>
			<table border="0">
				<tr>
					No account yet? Try to
					<a href="sign_up.php">register here!</a>
				</tr>
			</table>
		';
		
	}

	function printUserDescription($myusername)
	{
		echo "<div id='Login'>";
		$loginmessage = "User:" .  $myusername;
		echo $loginmessage;
		printLogout();
		echo "</div>";

					
	}

	function checkLogin($myusername,$mypassword)
	{
		// Connect to server and select databse.
		mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("Failed to connect to MySQL: " . mysql_error());
		mysql_select_db(DB_NAME)or die("Failed to connect to MySQL: " . mysql_error());

		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);

		//$sql="SELECT * FROM $table_name WHERE userName='$myusername' and password='$mypassword'";
		$result = mysql_query("SELECT userID, fullName, userName FROM websiteusers WHERE userName='$myusername' AND pass='$mypassword'") or die(mysql_error()); //db is hardcoded to reduce number of variables
			
		$userID = array();
		$i = 0;
		while($row = mysql_fetch_assoc($result)){
			$userID = $row['userID'];
			if($i>1){
				die("Zu viele Benutzer mit der selben id");
				return false;
			}
			$i++;
		}
		
		// Mysql_num_row is counting table row
		$count = mysql_num_rows($result);

		// If result matched $userName and $password, table row must be 1 row

		if($count == 1)
		{
			// Register $userName, $password and redirect to file "login_success.php"
			$query = "UPDATE `fb-projekt`.`websiteusers` SET `online` = '1' WHERE `websiteusers`.`userID` = $userID;";
			$result = mysql_query($query);
			
			$_SESSION['myusername'] = $myusername;
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getUserArray(){
		mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
		mysql_select_db(DB_NAME)or die("Failed to connect to MySQL: " . mysql_error());
		$query = "SELECT * from websiteusers where online=1";
		$result = mysql_query($query);
		
		$onlineUser = array();
		$i  = 0;
		while($row = mysql_fetch_assoc($result))
		{
			
				$onlineUser[$i]['userID'] = $row['userID'];
				$onlineUser[$i]['fullname'] = $row['fullname'];
				$onlineUser[$i]['userName'] = $row['userName'];
				$i++;
				
		}
		
		return $onlineUser;
	}
	


	function logoutUser()
	{
		mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
		mysql_select_db(DB_NAME)or die("Failed to connect to MySQL: " . mysql_error());
		$query = "SELECT userID, fullName, userName FROM websiteusers WHERE userName='". $_SESSION['myusername'] ."';";
		var_dump($query);
			$result = mysql_query($query) or die(mysql_error()); //db is hardcoded to reduce number of variables

		$userID = array();
		$i = 0;
		while($row = mysql_fetch_assoc($result)){
			$userID = $row['userID'];
			if($i>1){
				die("Zu viele Benutzer mit der selben id");
				return false;
			}
			$i++;
		}
		
		$query = "UPDATE `fb-projekt`.`websiteusers` SET `online` = '0' WHERE `websiteusers`.`userID` = $userID;";
		mysql_query($query);
		
		unset($_SESSION['myusername']);
		session_destroy();
		//echo "<script>setTimeout(function(){window.location.href='main.php'},4000);</script>";
	}

	function printLogout()
	{
		echo '
		<form method="POST" action="main.php">
		<input id="button" type="submit" name="logout" value="Logout">
		</form>';	
	}
	?>
