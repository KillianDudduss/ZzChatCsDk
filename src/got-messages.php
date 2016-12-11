<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
include('./fonctions.php');
got_messages('./../db/messages.txt');

//PHP function to collect the message from the textarea that needs to be put into the chat box.

function got_messages($filename)
{
	if (isset($_POST['text']))
	{
		$username=$_SESSION['username'];
		$now=date("d M Y, G:i", time());
		//now value is to add the current time next to the message into the chat 
		$message_send=$_POST['text'];
		$texte=parseText($message_send);
		$message = $username.";;".$texte.";;".$now;
		//We open the message.txt file to get the whole content of the chat
		$filecontent=lirefile($filename);
		$file=fopen($filename,'w');
		fwrite($file, $filecontent.$message."\r\n");
		fclose($file);
	}
}

?>
