<!DOCTYPE html>
<?php
 
if (!isset($_SESSION['username'])) 
{ 
  session_start(); 
} 
 
Function IsConnected () 
{ 
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
    echo "Personne n'est connecté!"; 
  } 
} 

?>