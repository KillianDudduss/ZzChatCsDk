<php?

Function got-messages($username)
{
	if (isset($_POST['envoi_message']))
	{
		$message = $username + ' écrit : ' + $_POST['message'];
		
		$filename='./../db/messages.txt';
		$file=fopen($filename,'r');
		$filecontent=fread($file,filesize($filename));
		fclose($file);

		$file=fopen($filename,'w');
		fwrite($file, $filecontent + $message +'/n');
		fclose($file);
	}	
}


?>
