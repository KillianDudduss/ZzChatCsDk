<!DOCTYPE html>
<?php

function logon($username,$password,$confirmpass,$email)
{
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
			fwrite($file,$username+";;"+$password+";;"+$email+";;/n");
			fclose($file);
			header('Location: ./login.php');
		}
		else
		{
			header('Location: ./../index.php#subscribe');
		}
	}
	else
	{
		header('Location: ./../index.php');
	}
}

session_start();
logon($_POST['$username'],$_POST['$password'],$_POST['$confirmpass'],$_POST['$email']);

?>