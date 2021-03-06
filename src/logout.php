<!DOCTYPE html>
<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
include('./fonctions.php');

logout($_SESSION['username']);


//function to log out of the current session

function logout($username)
{
	$filename='./../db/online.txt';
	$filecontents=lirefile($filename);
	if ($filecontents!="")
	{
		//erasing the name of the current user of the online.txt which is the file which contains the name of the online sessions.
		$file=fopen($filename,'w');
		$lines=explode(";;", $filecontents);
		foreach ($lines as $line) 
		{
			if(($line!=$username)&&($line!=""))
			{
				fwrite($file, $line.";;");
			}
		}
		fclose($file);
	}
	// Reset the session table
	// We empty it completely
	session_unset ();
	//Session destruction
	session_destroy();
	//Session table destruction
	unset($_SESSION);
	header('Location: ./../index.php');
}


?>
