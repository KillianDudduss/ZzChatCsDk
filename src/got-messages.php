<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}

got_messages();

//PHP function to collect the message from the textarea that needs to be put into the chat box.

function got_messages()
{
	if (isset($_POST['text']))
	{
		$username=$_SESSION['username'];
		$now=date("d M Y, G:i", time());
		//now value is to add the current time next to the message into the chat 
		$message_send=$_POST['text'];
		$texte=parseText($message_send);
		$message = $username.";;".$texte.";;".$now;
		$filename='./../db/messages.txt';
		//We open the message.txt file to get the whole content of the chat
		if (filesize($filename)!=0)
		{
			$file=fopen($filename,'r');
			$filecontent=fread($file,filesize($filename));
			fclose($file);
		}
		else
		{
			$filecontent="";
		}
		$file=fopen($filename,'w');
		fwrite($file, $filecontent.$message."\r\n");
		fclose($file);
	}
}

function parseText($texte)
{
	//---Smileys---//
/*	$texte = str_replace(':)', '<img src="pictures/smily.png" title="smiley" alt="smiley" />', $texte);
	$texte = str_replace(':p', '<img src="pictures/tongue.png" title="smiley" alt="smiley" />', $texte);
	$texte = str_replace(';)', '<img src="pictures/wink.png" title="smiley" alt="smiley" />', $texte);
	$texte = str_replace(':(', '<img src="pictures/sad.png" title="smiley" alt="smiley" />', $texte);
	$texte = str_replace('<3', '<img src="pictures/heart.png" title="smiley" alt="smiley" />', $texte);
	$texte = str_replace('ZZ', '<img src="pictures/ZZ.png" title="smiley" alt="smiley" />', $texte);
	*/
	//---bold---//
	$texte = preg_replace('`\[b\](.+)\[/b\]`isU', '<b>$1</b>', $texte); 
	
	//---italic---//
	$texte = preg_replace('`\[i\](.+)\[/i\]`isU', '<i>$1</i>', $texte);
	
	//---underline---//
	$texte = preg_replace('`\[U\](.+)\[/U\]`isU', '<u>$1</u>', $texte);
	
	//---color---//
	$texte = preg_replace('`\[black\](.+)\[/black\]`isU', '<font color = "black">$1</font>', $texte);
	$texte = preg_replace('`\[blue\](.+)\[/blue\]`isU', '<font color = "blue">$1</font>', $texte);
	$texte = preg_replace('`\[green\](.+)\[/green\]`isU', '<font color = "green">$1</font>', $texte);
	$texte = preg_replace('`\[red\](.+)\[/red\]`isU', '<font color = "red">$1</font>', $texte);
	$texte = preg_replace('`\[pink\](.+)\[/pink\]`isU', '<font color = "pink">$1</font>', $texte);
	return $texte;
}

?>
