<?php 
// Use of the good language
// if the cookie is 'in' or if the request is 'in',
// we include the file fr-lang.php
if ($_GET['langue'] == "fr" || $langue == "fr") 
	{
		include('src/fr-lang.php');
	}
// Use of the good language
// if the cookie is 'in' or if the request is 'in',
// we include the file fr-lang.php
elseif ($_GET['langue'] == "en" || $langue == "en")
	{
		include('src/en-lang.php');
	} 
?>
