<!DOCTYPE html>
<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ./../index.php');
  exit();
}
logout($_SESSION['username']);


//function to log out of the current session

function logout($username)
{
	$filename='./../db/online.txt';
	if (filesize($filename)!=0)
	{
		//erasing the name of the current user of the online.txt which is the file which contains the name of the online sessions.
		$file=fopen($filename,'r');
		$filecontents=fread($file,filesize($filename));
		fclose($file);
		$file=fopen($filename,'w');
		$lines=explode(";;", $filecontents);
		foreach ($lines as $line) 
		{
			echo $line;
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
}


?>
