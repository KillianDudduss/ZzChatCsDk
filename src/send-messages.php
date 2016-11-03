<?php

Function send-messages()
{
	$filename='./../db/messages.txt';
	$file=fopen($filename,'r');
	$filecontent=fread($file,filesize($filename));
	fclose($file);

	return $filecontent;
}

?>
