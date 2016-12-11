<!DOCTYPE html>
<?php
 
if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
include('./fonctions.php');

IsConnected();

//Function used to write into the user box the name of the users who are connected to the chat

function IsConnected () 
{ 
  $path=".";
  include($path.'/langchoice.php');
  $filename='./../db/online.txt'; 
  $filecontents=lirefile($filename);
  if ($filecontents=="")
  {
    echo $TXT_33; 
   //This is normally not possible to see this message.
  }
  else
  {
    $lines=explode(";;", $filecontents); 
    foreach ($lines as $line)  
    {  
      echo '<div>'.$line."</div>"; 
    }
  }
} 

?>
