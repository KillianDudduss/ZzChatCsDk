<!DOCTYPE html>
<?php

Function IsConnected ()
{
	$filename='./../db/online.txt';
	if (filesize($filename))
	{
		$file=fopen($filename,'r');
		$filecontents=fread($file,filesize($filename));
		fclose($file);
		$array = new array ();
		$lines=explode(";;", $filecontents);
		foreach ($lines as $line) 
		{
			$array += $line;
		}
		return $array;
	}
}

?>