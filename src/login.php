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
		header('Location: ../index.php');
		echo "Saississez un nom d'utilisateur et un mot de passe";
	}
}

function login($login,$pass)
{
	$auth=matchlog($login,$pass);
	if (!$auth)
	{
		echo 'Le mot de passe ou le login est incorrect';
	}
	else
	{
		echo 'Bienvenue sur le site';
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
		$fclose($file);
		$lines=explode("/n", $filecontents);
		foreach ($lines as $line) 
		{
			list($username,$password)=explode(';;', $line);
			if($login == $username)
			{	
				if($pass == $password)
				{
					$_SESSION['login'] = $login; //Garder la session active à travers le header
					$_SESSION['nb_erreur'] = 0;
					header('Location: src/corpschat.html'); //Si c'est bon on va dans la page de chat	
				}
				else
				{
					$_SESSION['nb_erreur'] = $_SESSION['nb_erreur']+1;
					if($_SESSION['nb_erreur']>=3)
					{
						header('Location: erreurs/erreur3.html'); // trop d'erreur 
					}
					else
					{
						header('Location: erreurs/erreur1.html'); 	//erreur1 pour login mais mauvais mdp
					}
				}
			}
			else
			{
				header('Location: erreurs/erreur2.html'); //erreur2 pour mauvais login
			}
		}
	}
	return $auth;
}

connect();

?>

