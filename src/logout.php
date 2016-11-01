<!DOCTYPE html>
<?php

function logout($username)
{
	session_start();
	$filename='./../db/online.txt';
	if (filesize($filename)!=0)
	{
		$file=fopen($filename,'r');
		$filecontents=fread($file,filesize($filename));
		fclose($file);
		$file=fopen($filename,'w');
		$lines=explode("/n", $filecontents);
		foreach ($lines as $line) 
		{
			if($line!=$username)
			{
				fwrite($file, $line+'/n');
			}
		}
		fclose($file);
	}
	session_destroy($username);
	unset($_SESSION["username"]);
   	unset($_SESSION["password"]);
	header('Location: ../index.php');
}

session_start();
logout($_POST['$username']);

?>