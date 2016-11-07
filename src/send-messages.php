<?php


function sendmessages()
>>>>>>> chat
{
	$filename='./../db/messages.txt';
	$file=fopen($filename,'r');
	$filecontent=fread($file,filesize($filename));
	fclose($file);
	$lines=explode("\r\n", $filecontents);
	foreach ($lines as $line) 
	{
		afficher($line)
	}
}

function afficher($line)
{
	list($username,$message,$date)=explode(";;", $line);
	//plus qu'a afficher ;) echo :p

}

?>
