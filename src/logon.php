<!DOCTYPE html>
<?php

logon($_POST['username'],$_POST['password'],$_POST['confirmpass'],$_POST['email']);

function logon($username,$password,$confirmpass,$email)
{
	session_start();
	if (isset($username)&&isset($password)&&isset($confirmpass)&&isset($email))
	{
		if ($password==$confirmpass)
		{
			$filename='./../db/users.txt';
			$file=fopen($filename, 'r');
			$filecontents = fread($file, filesize($filename));
			fclose($file);
			$file=fopen($filename, 'w');
			fwrite($file,$filecontents);
			fwrite($file,$username.";;".$password.";;".$email."\r\n");
			fclose($file);
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header('Location: ./../index.php');
		}
		else
		{
			header('Location: ./../index.php#logon');
		}
	}
	else
	{
		header('Location: ./../index.php#logon');
	}
}



?>