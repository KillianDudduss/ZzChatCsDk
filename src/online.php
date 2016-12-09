<!DOCTYPE html>
<?php
 
if (!isset($_SESSION['username'])) 
{ 
  session_start();
}


IsConnected();

//Function used to write into the user box the name of the users who are connected to the chat

function IsConnected () 
{ 
  $path=".";
  include($path.'/langchoice.php');
  $filename='./../db/online.txt'; 
  if (filesize($filename)!=0) 
  { 
    $file=fopen($filename,'r'); 
    $filecontents=fread($file,filesize($filename)); 
    fclose($file);  
    $lines=explode(";;", $filecontents); 
    foreach ($lines as $line)  
    {  
      echo '<div>'.$line."</div>"; 
    }  
  } 
  else 
  { 
    echo $TXT_33; 
   //This is normally not possible to see this message.
  } 
} 

?>
