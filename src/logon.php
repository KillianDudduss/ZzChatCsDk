<!DOCTYPE html>
<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
} 
logon($_POST['username'],$_POST['password'],$_POST['confirmpass'],$_POST['email']);

function logon($username,$password,$confirmpass,$email)
{
	if (isset($username)&&isset($password)&&isset($confirmpass)&&isset($email))
	{
		if ($password==$confirmpass)
		{
			$filename='./../db/users.txt';
			$file=fopen($filename, 'r');
			$filecontents = fread($file, filesize($filename));
			fclose($file);
			$lines=explode("\r\n", $filecontents);
			$use=0;
			foreach ($lines as $line) 
			{
				if ($line!="")
				{
					list($user, $pass, $mail)=explode(";;", $line);
					if ($user==$username)
					{
						$use=1;
					}
				}
			}
			if ($use==0)
			{
				$file=fopen($filename, 'w');
				fwrite($file,$filecontents);
				fwrite($file,$username.";;".sha1($password).";;".$email."\r\n");
				fclose($file);
				header('Location: ./../index.php');
			}
			else
			{
				echo "le nom d'utilisateur est déja utilisé, veuillez vous connectez ou en choisir un autre.";
			}
		}
		else
		{
			header('Location: ./../index.php#logon');
		}
	}
	else
	{
		header('Location: ./../index.php#logon');
	}
}

?>