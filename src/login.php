<!DOCTYPE html>
<?php

function connect()
{
	if (isset($_POST['login-submit'])&&isset($_POST['username'])&&isset($_POST['password']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		login($username,$password);
	}
	else
	{
		header('Location: ./../index.php');
	}
}

function login($login,$pass)
{
	$auth=matchlog($login,$pass);
	if ($auth)
	{
		$filename='./../db/online.txt';
		$file=fopen($filename,'r');
		$filecontent=fread($file,filesize($filename));
		fclose($file);
		$file=fopen($filename,'w');
		fwrite($file, $filecontent+$login+'/n');
		fclose($file);
	}
}

function matchlog($login,$pass)
{
	$auth=false;
	$filename="./../db/users.txt";
	if (isset($login)&&isset($pass)&&(filesize($filename)!=0))
	{
		$file=fopen($filename, "r");
		$filecontents = fread($file, filesize($filename));
		fclose($file);
		$lines=explode("/n", $filecontents);
		if (isset($_POST['erreur']))
		{
			$nb_erreur = $_POST['erreur'];
		}
		foreach ($lines as $line) 
		{
			list($username,$password)=explode(";;", $line);
			if($login == $username)
			{	
				if ($nb_erreur==-1)
				{		
					$nb_erreur = 0;
				}
				if($pass == $password)
				{
					$_SESSION['login'] = $login; //Garder la session active à travers le header
					header('Location: corpschat.html'); //Si c'est bon on va dans la page de chat	
				}
				else
				{
					$nb_erreur = $nb_erreur+1;
					header('Location: ./../index.php?erreur='.$nb_erreur); //message d'erreur
				}
			}
			else
			{
				$nb_erreur = -1;
				header('Location: ./../index.php?erreur='.$nb_erreur); //message d'erreur
			}
		}
	}
	return $auth;
}

connect();

?>

