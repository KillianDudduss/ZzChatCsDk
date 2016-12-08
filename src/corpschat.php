<?php

if (!isset($_SESSION['username'])) 
{ 
  session_start();
}
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ./../index.php');
  exit();
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Zz Chat </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 		<script type="text/javascript" src="../static/JS/bootstrap.js"></script>
 		<script type="text/javascript" src="../static/JS/monjs.js"></script>
 		<link rel="stylesheet" type="text/css" href="./../static/CSS/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="./../static/CSS/moncss.css">
	</head>	
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	    		<div class="navbar-header">
	     		  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	           		 	<span class="sr-only">Toggle navigation</span>
	           			<span class="icon-bar"></span>
	        				<span class="icon-bar"></span>  
	         				<span class="icon-bar"></span>
	       		 	</button>
	         	  <a class="navbar-brand" href="#">Zz Chat</a>
	       	</div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	          	<li id="chat" class="active" onclick="BasculeElement(this);"><a href="#chat">Chat</a></li>
	            <li id="logout" class="" onclick="BasculeElement(this);"><a href="logout.php">Se déconnecter</a></li>
	            <li id="parameter" class="" onclick="BasculeElement(this);"><a href="#parameter">Paramètres</a></li>
	            <li id="contact" class="" onclick="BasculeElement(this);"><a href="#contact">Contacter</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    <div class="panel panel-login">
           <hr>
        </div>
        <div class="container">
      		<div class="row">
        		<div class="col-md-6 col-md-offset-3">
				    <div id="#chat" style="display: block;">
				    	<div class="messagecontainer">
					    	<div class="scroll" id="scrollmessage">
					    		
					    	</div>
					    </div>
				    	<form class="form" id="send-message-form" role="form">
				    		<div id="toolbar" > 
						<strong><button id="gras" onclick="balise('bold');">Gras</button></strong>
						<i><button id="italic" onclick="balise('italic');">I</button></i>
						<u><button id="souligne" onclick="balise('underline');">U</button></u>
						<button id="lien" onclick="balise('link');">Lien</button>
                			</div> 
				    		<div class="form-group">
				    			<textarea id="message-send" name="message-send" rows="3"></textarea>
				    		</div>
				    		<div class="form-group">
		                      <div class="row">
		                        <div class="col-sm-6 col-sm-offset-3">
		                          	<input type="submit" name="message-submit" id="message-submit" tabindex="1" class="form-control btn btn-register" value="Envoyer"/>
		                        </div>
		                      </div>
		                    </div>
				    	</form>
				    </div>
				    <div id="#logout" style="display: none;">
				    </div>
				    <div id="#parameter" style="display: none;">
				    	paramètre du chat
				    </div>
				    <div id="#contact" style="display: none;">
				    	contact
		    		</div>
		    	</div>
		    	<div class="right" >
		    		<h3><center>Utilisateurs connectés :</center></h3>
		    		<div class="users" id="online">
			    		
		    		</div>
		    	</div>
		    </div>
		</div>
		<script>

			$(document).on("keydown", function(event){
			  if(event.keyCode == 13){
			    event.preventDefault();
			    send();
			  }
			});

			$(document).ready(function(){
			  
			  updateChat();
			  updateOnline();

			  scrollbas();

			  setInterval(updateChat, 2000);
			  setInterval(updateOnline,5000);
			});

		</script>
	</body>
</html>
