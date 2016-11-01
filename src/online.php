<!DOCTYPE html>
<?php

Function IsConnected ()
{
	$filename='./../db/online.txt';
	$file=fopen($filename,'r');
	$filecontents=fread($file,filesize($filename));
	fclose($file);
	
	$array = new array ();
	
	$lines=explode("/n", $filecontents);
	foreach ($lines as $line) 
	{
		if (($line!="0")&&($line!="00"))
		{
			$array += $line;
		}
	}
	return $array;
}

?>