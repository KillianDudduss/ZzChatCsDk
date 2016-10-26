<!DOCTYPE html>
<?php

Function logon($username,$password,$confirmpass)
{
	include("login.php")

	if (isset($username)&&isset($password)&&(isset($confirmpass)))
	{
		if ($password==$confirmpass)
		{
			$filename='./../db/users.txt';
			$file=fopen($filename, 'r');
			$filecontents = fread($file, filesize($filename));
			$fclose($file);
			$file=fopen($filename, 'w');
			fwrite($file,$filecontents);
			fwrite($file,$username+";;"+$password+"/n");
			fclose($file);
			header('Location: login.php');
		}
		else
		{
			header('Location: index.php/#subscribe');
		}
	}
}

?>