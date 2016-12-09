<?php 
// Use of the good language
// if the cookie is 'in' or if the request is 'in',
// we include the file fr-lang.php
//Language cookie

	if ((isset ($_COOKIE['CHOIXlang'])) && isset($_GET['langue']) && ($_GET['langue'] != 'fr') && ($_GET['langue'] != 'en'))
		{  			
		$langue = $_COOKIE['CHOIXlang'];
		}
	// The choice of the cookie is declared by the url
	else 
	{
	  include ($path.'/set_cookie.php');
	  if (isset($_GET['langue'])&&(($_GET['langue'] == 'en') || ($_GET['langue'] == 'fr')))
		{
		$langue = $_GET['langue'];
		set_cookie($langue);
		}

	// If no language is declared then we try to guess it with the default language of the browser
		else 			
		{
			$langue = 'fr';
			set_cookie($langue);
		}
	}
	if ($langue == "fr") 
	{
		$inclu=$path.'/fr-lang.php';
		include($inclu);
	}
	// Use of the good language
	// if the cookie is 'in' or if the request is 'in',
	// we include the file fr-lang.php
	elseif ($langue == "en")
	{
		$inclu=$path.'/en-lang.php';
		include($inclu);
	} 
	else
	{
		$inclu=$path.'/fr-lang.php';
		include($inclu);
	}
?>
