<?php

function set_cookie($langue)
	{
//Duration of the cookie (1 year)
	$expire = 365*24*3600;
//Saving the cookie by the name  'CHOIXlang + détection' if there is an error
	if (setcookie("CHOIXlang", $langue, time() + $expire) != TRUE)
		{
//     	        echo 'Le cookie na pas marché<br />';
		}
	else
		{
		setcookie("CHOIXlang", $langue, time() + $expire);
//		echo 'Le cookie a marché<br />';		
		}
	}

?>
