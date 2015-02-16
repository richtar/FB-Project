<script>
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //stores a function (or the name of a function) to be called automatically each time the readyState property changes
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200) // 4 = request finished and response is ready | 200 = OK ,(404 = page not found)
    {
		//var tf_output = document.getElementById("tf_output");
		//tf_output.value = "Test";
		document.getElementById("tf_output").value=xmlhttp.responseText; //get the response data as a string
    }
  }
  		xmlhttp.open("POST","chat.txt",true); //post request used to be able to send larger amount of data | true= javascript doesn't have to wait for the server response and can continue execution
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); //data will be posted like a html form
		xmlhttp.send();
}

function sendMessage()
{
	
		var mymessage = document.getElementById("tf_input").value;
	
		$.ajax({
		type: 'POST',
		url: 'saveMessage.php',
		data: {message: mymessage}
		,
        success: function( data ) {
            console.log( data );
        }
		});
}


/* function saveMessage(){
			var tf_input = document.getElementById('tf_input');
			var data = tf_input.value;
		$.ajax({
			url: 'saveMessage.php',
			type: 'POST',
			data:  data,
			success: function(result) {
				alert('the data was successfully sent to the server');
			}
		});
	
} */
</script>

<?php
function printChat()
{
	
	
	echo '<div class="chatbox">';
	echo '<textarea id="tf_output" name="tf_output" cols="100" rows="50"></textarea>';
	echo '
	<form action="main.php" method="POST"><br/>
    <input name="tf_input" type="text" id="tf_input"/>
	<button type="button" id="save" onclick="sendMessage()">Send Message</button>
	</form>
	</div>';
	
}

function saveMessage($username, $input)
{
	
		$fullMessage = $username . '-' . $input . "\n";
		$ret = file_put_contents('chat.txt', $fullMessage, FILE_APPEND | LOCK_EX);
    if($ret === false) 
	{
        die('There was an error writing this file');
    }
    else 
	{
        echo "$ret bytes written to file";
	}
}
?>
