<!DOCTYPE html>
<?php

session_start();
logout($_SESSION['login']);

function logout($username)
{
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
			echo $line;
			if($line!=$username)
			{
				fwrite($file, $line+'/n');
			}
		}
		fclose($file);
	}
	session_destroy();
	unset($_SESSION);
	header('Location: ../index.php');
}


?>