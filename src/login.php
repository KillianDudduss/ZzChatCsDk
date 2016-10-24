<?php


Function matchlog($login,$pass)
{
	$auth=false;

	if (isset($login)&&isset($pass))
	{
		$filename='./../db/users.txt';
		$file=fopen($filename, 'r');
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
					header('Location: /src/corpschat.html'); //Si c'est bon on va dans la page de chat	
				}
				else
				{
					$_SESSION['nb_erreur'] = $_SESSION['nb_erreur']+1;
					if($_SESSION['nb_erreur']>=3)
					{
						header('Location: erreurs/erreur3.html');
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

Function logon($username,$password,$confirmpass)
{
	if (isset($username)&&isset($password)&&(isser($confirmpass)))
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
}
?>