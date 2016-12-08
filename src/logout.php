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

function logout($username)
{
	$filename='./../db/online.txt';
	if (filesize($filename)!=0)
	{
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
	// Réinitialisation du tableau de session
	// On le vide intégralement
	$_SESSION = array();
	// Destruction de la session
	session_destroy();
	// Destruction du tableau de session
	unset($_SESSION);
}


?>