<html>
 	<head>
		<title> Zz Chat </title>
 		<script type="text/javascript" scr="./../static/js/bootstrap.js"></script>
 		<link rel="stylesheet" type="text/css" href="./../static/CSS/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="./../static/CSS/monCSS.css">
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
	          	<li class="active"><a href="#forgotpass">Mot de passe oublié</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    <div class="container">
	      <div class="row">
	        <div class="col-md-6 col-md-offset-3">
	         <div class="panel panel-login">
	           <div class="panel-heading">
	            <div class="row">
	              <div class="col-xs-6">
	                <a href="#forgotpass" class="active" id="login-form-link">ForgotPass</a>
	              </div>
	            </div>
	            <hr>
	          </div>
	          <div class="panel-body">
	            <div class="row">
	              <div class="col-lg-12">
	                <form id="login-form-link" action="forgotpass.php" method="post" role="form" style="display: block;">
	                	<div class="form-group">
	                		<?php
	                		if (isset($_POST['recover-submit']))
	                		{
	                			$filename="./../db/users.txt";
								if (isset($_POST['username'])&&isset($_POST['email'])&&(filesize($filename)!=0))
								{
									$file=fopen($filename, "r");
									$filecontents = fread($file, filesize($filename));
									fclose($file);
									$lines=explode("/n", $filecontents);
									$erreur=-1;
									foreach ($lines as $line) 
									{
										list($username,$password,$email)=explode(";;", $line);
										if($_POST['username'] == $username)
										{	
											$erreur=0;
											if(strcmp($_POST['email'],$email)==0)
											{
												$mail = $_POST['email']; // Déclaration de l'adresse de destination.
												if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
												{
													$passage_ligne = "\r\n";
												}
												else
												{
													$passage_ligne = "\n";
												}
												//=====Déclaration des messages au format texte et au format HTML.
												$message_html = 	"<html>
																		<head>
																		</head>
																		<body>
																			<b>Bonjour</b>, vous avez demandez de récupérer votre mot de passe pour accéder au <i>ZzChat</i>.<br>
																			Nous avons pris en compte votre demande et nous vous transmettons ici votre mot de passe.
																			Si vous n'êtes pas celui à l'origine de cette demande, n'hésitez pas à aller changer votre mot de passe sur le site.
																			<br>
																			<b> Votre mot de passe est :</b>".$password."<br>
																			L'equipe ZzChat Vous souhaite une bonne journée.
																		</body>
																	</html>";
												//==========
												 
												//=====Création de la boundary
												$boundary = "-----=".md5(rand());
												//==========
												 
												//=====Définition du sujet.
												$sujet = "Récuperation du mot de passe ZzChat";
												//=========
												 
												//=====Création du header de l'e-mail.
												$header = "From: \"WeaponsB\"<zzchat2016@gmail.com>".$passage_ligne;  //motdepasse de l'e-mail : zzchatsimonkillian au cas où ;)
												$header = "Reply-to: \"WeaponsB\"<".$_POST['email'];
												$header.= "MIME-Version: 1.0".$passage_ligne;
												$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
												//==========
												 
												//=====Création du message.
												$message = $passage_ligne."--".$boundary.$passage_ligne;
												//=====Ajout du message au format HTML
												$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
												$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
												$message.= $passage_ligne.$message_html.$passage_ligne;
												//==========
												$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
												$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
												//==========
												 
												//=====Envoi de l'e-mail.
												mail($mail,$sujet,$message,$header);
												//==========
												echo "Votre mot de passe vous à été envoyé par e-Mail.";
											}
											else
											{
												echo "Votre adresse mail ne correspond pas à votre nom d'utilisateur.";
											}
										}
									}
									if ($erreur==-1)
									{
										echo "Votre nom d'utilisateur est inconnu, veuillez vous inscrire en <a href='./../index.php#logon'>cliquant ici</a>";
									}
								}
	                		}
	                		?>
	                	</div>
		                <div class="form-group">
		                  <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Identifiant" value="">
		                </div>
		                <div class="form-group">
		                  <input type="text" name="email" id="email" tabindex="2" class="form-control" placeholder="E-mail">
		                </div>
		                <div class="form-group">
		                  <div class="row">
		                    <div class="col-sm-6 col-sm-offset-3">
		                        <input type="submit" name="recover-submit" id="recover-submit" tabindex="4" class="form-control btn btn-login" value="Récupérer Mot de Passe">
		                    </div>
		                  </div>
		                </div>
	                </form>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
	</body>
</html>