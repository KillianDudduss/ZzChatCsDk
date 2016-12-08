<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ./../index.php');
  exit();
}

got_messages();

function got_messages()
{
	if (isset($_POST['text']))
	{
		$username=$_SESSION['username'];
		$now=date("d M Y, G:i", time());
		$message_send=$_POST['text'];
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
		fclose($file);
	}
}

?>
