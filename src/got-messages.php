<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}

got_messages();

//PHP function to collect the message from the textarea that needs to be put into the chat box.

function got_messages()
{
	if (isset($_POST['text']))
	{
		$username=$_SESSION['username'];
		$now=date("d M Y, G:i", time());
		//now value is to add the current time next to the message into the chat 
		$message_send=$_POST['text'];
		$message = $username.";;".$message_send.";;".$now;
		$filename='./../db/messages.txt';
		//We open the message.txt file to get the whole content of the chat
		if (filesize($filename)!=0)
		{
			$file=fopen($filename,'r');
			$filecontent=fread($file,filesize($filename));
			fclose($file);
		}
		else
		{
			$filecontent="";
		}
		$file=fopen($filename,'w');
		fwrite($file, $filecontent.$message."\r\n");
		fclose($file);
	}
}

?>
