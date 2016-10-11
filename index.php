<php?

//include("fonction.php")

// First start a session.
session_start();

// Check to see if this run of the script was caused by our login submit button being clicked.
if (isset($_POST['login-submit']))
{
	// Also check that our usename and password were passed along. If not, jump
	// down to our error message about providing both pieces of information.
	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$json_source = file_get_contents('login');
		$json=json_decode($json_source);
		foreach($json as $v)
		{
			if($v->login == $username)
			{	
				if($v->password == $password)
				{
					$_SESSION['username'] = $username;
					header('Location: chat.html'); //Si c'est bon on va dans la page de chat	
				}
				else
				{
					header('Location: erreurs/erreur1.html'); //erreur1 pour login mais mauvais mdp
				}
			}
			else
			{
				header('Location: erreurs/erreur2.html'); //erreur2 pour mauvais login
			}
		}
	}
}



?>
