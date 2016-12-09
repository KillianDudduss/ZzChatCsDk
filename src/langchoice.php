<?php 
// Use of the good language
// if the cookie is 'in' or if the request is 'in',
// we include the file fr-lang.php
if ($langue == "fr") 
	{
		include('/src/fr-lang.php');
	}
// Use of the good language
// if the cookie is 'in' or if the request is 'in',
// we include the file fr-lang.php
elseif ($langue == "en")
	{
		include('/src/en-lang.php');
	} 
	else
	{
		include('/src/fr-lang.php');
	}
?>
