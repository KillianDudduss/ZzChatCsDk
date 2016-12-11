<!DOCTYPE html>
<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
} 
include('./fonctions.php');

logon($_POST['username'],$_POST['password'],$_POST['confirmpass'],$_POST['email']);

//Function to sign up.

function logon($username,$password,$confirmpass,$email)
{
	$path=".";
    include($path.'/langchoice.php');
	if (isset($username)&&isset($password)&&isset($confirmpass)&&isset($email))
	{
		//we need to check if the pass = confirmpass
		if ($password==$confirmpass)
		{
			$filename='./../db/users.txt';
			$filecontents = lirefile($filename);
			$lines=explode("\n", $filecontents);
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
				//adding the user into the users.txt
				$file=fopen($filename, 'w');
				fwrite($file,$filecontents);
				fwrite($file,$username.";;".sha1($password).";;".$email."\r\n");
				fclose($file);
				header('Location: ./../index.php');
			}
			else
			{
				//error message if the user already exist
				echo $TXT_32;
				// We need to echo it into the correct language too...
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
