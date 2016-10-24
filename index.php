<php?

include("/src/login.php");

// First start a session.
session_start();

// Check to see if this run of the script was caused by our login submit button being clicked.
if (isset($_POST['login-submit']))
{
	// Also check that our usename and password were passed along. If not, jump
	// down to our error message about providing both pieces of information.
	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		foreach($json as $v)
		{
			connect($v->username,$v->password);
		}
	


?>
