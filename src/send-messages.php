<?php 
 
if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
include('./fonctions.php');

sendmessages();

// 2 functions to send display the message into the chat box

function sendmessages() 
{ 
  $filename='./../db/messages.txt'; 
  $filecontent=lirefile($filename);
  $lines=explode("\n", $filecontent); 
  foreach ($lines as $line)  
  { 
    if ($line!="") 
    { 
      $aff=afficher($line); 
      echo $aff;
    } 
  } 
} 

?>
