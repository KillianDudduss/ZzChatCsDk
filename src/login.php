<?php

Function matchlog($login,$pass)
{
	$auth=false;

	if (isset($login)&&isset($pass))
	{
		$filename='./../db/user.txt';
		$file=fopen($filename, 'r');
		$filecontents = fread($file, filesize($filename));
		$fclose($file);
		$lines=explode("/n", $filecontents);
		foreach ($lines as $line) 
		{
			list($username,$password)=explode(';;', $line);
			if (($username==$login)&&($password==$pass))
			{
				$auth=true;
				break;
			}
		}
	}
}

Function connect($login,$pass)
{
	matchlog($login,$pass);
	if (!$auth)
	{
		echo 'Le mot de passe ou le login est incorrect';
	}
	else
	{
		echo 'Bienvenue sur le site';
		$filename='./../db/online.txt'
		$file=fopen($filename,'r');
		$filecontent=fread($file,filesize($filename));
		fclose($file);
		$file=fopen($filename,'w');
		fwrite($file, $filecontent+$login+'/n');
		fclose($file);
	}
}

Function disconnect($username)
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
	$auth=false;
}
?>