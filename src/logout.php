<!DOCTYPE html>
<?php

Function logout($username)
{
	$filename='./../db/online.txt'
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
	session_destroy($username)();
	header('Location: ../index.php');
}

?>