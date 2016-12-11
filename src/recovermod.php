<?php

recover($_POST['key'],$_POST['password'],$_POST['confirmpass']);
include('./fonctions.php');

//function used to recover the password if u have lost it

function recover($key,$password,$confirmpass)
{
	$filename="./../db/users.txt";
	$nb_erreur=-1;
	if (isset($key)&&isset($password)&&isset($confirmpass)&&(filesize($filename)!=0))
	{
		if ($password==$confirmpass)
		{
			$filecontents = lirefile($filename);
			$fileuser=fopen($filename, "w");
			$lines=explode("\r\n", $filecontents);
			foreach ($lines as $line) 
			{
				if ($line!="")
				{
					list($username, $pass, $email)=explode(";;", $line);
					if($key == md5($username))
					{	
						fwrite($fileuser, $username.";;".sha1($password).";;".$email."\r\n");	
						$nb_erreur=0;
					}
					else
					{
						fwrite($fileuser, $line."\r\n");
					}
				}
			}
			fclose($fileuser);
		}
		else
		{
			$nb_erreur=1;
		}
	}
	if ($nb_erreur==0)
	{
		header('Location: ./../index.php');
	}
	else
	{
		header('Location: ./recoverpass.php?key='.$key.'&erreur='.$nb_erreur); //message d'erreur
	}
}

?>
