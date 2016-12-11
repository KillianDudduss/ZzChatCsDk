<!DOCTYPE html>
<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
include('./fonctions.php');

connect();


//Function to connect to the chat with the use of the other function login

function connect()
{
	if (isset($_POST['login-submit'])&&isset($_POST['username'])&&isset($_POST['password'])&&(isset($_POST['erreur'])))
	{
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		//errors management
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


//Function to directly log in into the core chat

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
			if ($line!="")
			{
				list($username, $password, $email)=explode(";;", $line);
				if(($login == $username)||($login==$email))
				{	
					if ($nb_erreur==-1)
					{		
						$nb_erreur=0;
					}
					if($pass == $password)
					{
						$_SESSION['username'] = $username; //Keep the seesion load thanks to the header
						$filename='./../db/online.txt';
						$filecontents=lirefile($filename);
						if($filecontents!="")
						{
							$lines=explode(";;", $filecontents);
							$alreadyconnect=0;
							foreach ($lines as $line) 
							{
								if ($line==$username)
								{
									$alreadyconnect=1;
								}
							}
							if ($alreadyconnect==0)
							{
								$filecontents=$filecontents.$username.";;";
							}
						}
						else
						{
							$filecontents=$username.";;";
						}
						$file=fopen($filename,'w');
						fwrite($file,$filecontents);
						fclose($file);
						header('Location: corpschat.php'); // If it's correct we go to the chat
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
			header('Location: ./../index.php?erreur='.$nb_erreur); //error message
		}
	}
}

?>

