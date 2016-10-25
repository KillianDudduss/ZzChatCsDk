<?php

include("login.php")
$username=$_POST['usernameon'];
$password=$_POST['passwordon'];
$confirmpass=$_POST['confirmpass'];

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
		connect($username,$password);
	}
	else
	{
		header('Location: index.html/#subscribe');
	}
}

?>