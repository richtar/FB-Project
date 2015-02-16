<?php session_start();?>
SAVING
<?php

if(isset($_POST['message']) && $_SESSION['myusername'])
{
	$date = new DateTime();
	
	$fullMessage = $date->format('H:i:s') ."-". $_SESSION['myusername'] .": ". $_POST['message']  ."\n";
		$ret = file_put_contents('chat.txt', $fullMessage, FILE_APPEND | LOCK_EX);
    if($ret === false) 
	{
        die('There was an error writing this file');
    }
    else 
	{
        echo "$ret bytes written to file";
	}
	
	
} else {
	die("SESSION not found");
}

?>
