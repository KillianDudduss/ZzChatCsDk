<?php


use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
	public function testloginphp()
	{
		$this->assertTrue(1 === 1, "essaie des premier tests pour comprendre");
		$_POST['username']="simon";
		$_POST['login-submit']=true;
		$_POST['password']="s";
		$_POST['erreur']=-1;
		//include ('./../src/login.php');
		/*$this->assertequal($erreur,1,"il y a eu une tentative de connexion qui a échoué.");
		$this->assertequal($_SESSION['username'],$_POST['username'],"les données de session et posté corresponde.");
		$_POST['erreur']=1;
		connect();
		$this->assertequal($erreur,2,"il y a eu une tentative de connexion qui a échoué une deuxième fois.");
		$_POST['password']="sss";
		connect();
		$filename='./../db/online.txt';
		$this->assertNotEquals(filesize($filename),0,"le fichier n'est pas vide");
		if(filesize($filename)!=0)
		{
			$file=fopen($filename,'r');
			$filecontents=fread($file,filesize($filename));
			fclose($file);
			$lines=explode(";;", $filecontents);
			$alreadyconnect=0;
			foreach ($lines as $line) 
			{
				if ($line==$username)
				{
					$alreadyconnect=1;
				}
			}
			$this->assertEquals($alreadyconnect,1,"l'utilisateur est enregistrer dans le fichier online.txt");
		}
*/

	}
}


?>