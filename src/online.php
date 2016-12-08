<!DOCTYPE html>
<?php
 
if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ./../index.php');
  exit();
}

IsConnected();

function IsConnected () 
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