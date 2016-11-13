<!DOCTYPE html>
<?php

session_start();
connect();

function connect()
{
	if (isset($_POST['login-submit'])&&isset($_POST['username'])&&isset($_POST['password'])&&(isset($_POST['erreur'])))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if ($_SESSION['username']!=$username)
		{
			$nb_erreur=-1;
			$change=1;
		}
		else
		{
			$nb_erreur=$_POST['erreur'];
			$change=0;
		}
		$_SESSION['username']=$username;
		login($username,$password,$nb_erreur,$change);
	}
	else
	{
		header('Location: ./../index.php');
	}
}

function login($login,$pass,$nb_erreur,$change)
{
	$filename="./../db/users.txt";
	if (isset($login)&&isset($pass)&&(filesize($filename)!=0))
	{
		$file=fopen($filename, "r");
		$filecontents = fread($file, filesize($filename));
		fclose($file);
		$lines=explode("\r\n", $filecontents);
		foreach ($lines as $line) 
		{
			list($username, $password, $email)=explode(";;", $line);
			if ($line!="")
			{
				if(($login == $username)||($login==$email))
				{	
					if ($nb_erreur==-1)
					{		
						$nb_erreur=0;
					}
					if($pass == $password)
					{
						$_SESSION['login'] = $username; //Garder la session active à travers le header
						$filename='./../db/online.txt';
						if(filesize($filename)!=0)
						{
							$file=fopen($filename,'r');
							$filecontents=fread($file,filesize($filename));
							fclose($file);
							$filecontents=$filecontents.$username.";;";
						}
						else
						{
							$filecontents=$username.";;";
						}
						$file=fopen($filename,'w');
						fwrite($file,$filecontents);
						fclose($file);
						header('Location: corpschat.php'); //Si c'est bon on va dans la page de chat
					}
					else
					{
						$nb_erreur = $nb_erreur+1;
					}
				}
			}
		}
		if ((($nb_erreur!=0)&&(($nb_erreur!=$_POST['erreur'])||($change==1)))||($nb_erreur==-1))
		{
			if($nb_erreur==-1)
			{
				$_SESSION['username']="";
			}
			header('Location: ./../index.php?erreur='.$nb_erreur); //message d'erreur
		}
	}
}

?>

