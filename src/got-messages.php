<?php
<<<<<<< HEAD
=======
session_start();
got_messages();
>>>>>>> chat

Function got_messages()
{
	if ((isset($_POST['message-submit']))&&(isset($_POST['message-send'])))
	{
<<<<<<< HEAD
		$message = $username.";;".$_POST['message'];
		$filename='./../db/messages.txt';
		$file=fopen($filename,'r');
		$filecontent=fread($file,filesize($filename));
		fclose($file);
		$file=fopen($filename,'w');
		$now=date("d M Y, G:i", )
		fwrite($file, $filecontent.$message.$now.'/r/n');
=======
		$username=$_SESSION['username'];
		$now=date("d M Y, G:i", time());
		$message_send=$_POST['message-send'];
		$message = $username.";;".$message_send.";;".$now;
		$filename='./../db/messages.txt';
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
>>>>>>> chat
		fclose($file);
		echo "message sauvegarder";
	}
	else 
	{
		echo "pblm";
	}	
}

?>
