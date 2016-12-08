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
sendmessages(); 
 
function sendmessages() 
{ 
  $filename='./../db/messages.txt'; 
  if (filesize($filename)!=0) 
  { 
    $file=fopen($filename,'r'); 
    $filecontent=fread($file,filesize($filename)); 
    fclose($file); 
  } 
  else 
  { 
    $filecontent=""; 
  } 
  $lines=explode("\r\n", $filecontent); 
  foreach ($lines as $line)  
  { 
    if ($line!="") 
    { 
      afficher($line); 
    } 
  } 
} 
 
function afficher($line) 
{ 
  list($username,$message,$date)=explode(";;", $line); 
  echo '<div class="userdate">'.$username." : ".$date." : ".'</div><div class="message">'.$message."</div>"; 
 
}
