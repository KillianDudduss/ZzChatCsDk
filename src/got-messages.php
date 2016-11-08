<?php
session_start();
got_messages();

Function got_messages()
{
	if ((isset($_POST['message-submit']))&&(isset($_POST['message-send']))&&($_POST['message-send'])!="")
	{
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
		fclose($file);
	}
	header('Location: corpschat.php');
}

?>
