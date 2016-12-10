<!DOCTYPE html>
<html>
 	<head>
		<title> Zz Chat </title>
 		<script type="text/javascript" src="./../static/js/bootstrap.js"></script>
 		<script type="text/javascript" src="./../static/JS/monjs.js"></script>
 		<link rel="stylesheet" type="text/css" href="./../static/CSS/bootstrap.css">
    	<link rel="stylesheet" type="text/css" href="./../static/CSS/moncss.css">
	</head>
	<body>
		<?php $path=".";
        include($path.'/langchoice.php');
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	    		<div class="navbar-header">
	     		  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	           		 	<span class="sr-only">Toggle navigation</span>
	           			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>  
	         			<span class="icon-bar"></span>
	       		 	</button>
	         	  <a class="navbar-brand" href="./../index.php#">Zz Chat</a>
	       	</div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	          	<li class="active"><a href="#forgotpass"><?php echo $TXT_8; ?></a></li>
	          	<li id="fr" class="" ><a href="?langue=fr" >FR</a></li>    <!--style="display : none;"-->
	   	    	<li id="en" class="" ><a href="?langue=en" >EN</a></li>
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
	                <a href="#forgotpass" class="active" id="login-form-link"><?php echo $TXT_8; ?></a>
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
									$lines=explode("\r\n", $filecontents);
									$erreur=-1;
									foreach ($lines as $line) 
									{
										if ($line!="")
										{
											list($username,$password,$email)=explode(";;", $line);
											if(strcmp($_POST['username'],$username)==0)
											{	
												$erreur=0;
												if(strcmp($_POST['email'],$email)==0)
												{
													$mail = $_POST['email']; // Destination address mail.
													if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
													{
														$passage_ligne = "\r\n";
													}
													else
													{
														$passage_ligne = "\n";
													}
													//=====Message in text and html form.
													$message_html = 	"<html>
																			<head>
																			</head>
																			<body>
																				<b>".$TXT_20."</b>, ".$TXT_21." <i>ZzChat</i>.<br>
																				".$TXT_22."
																				<br>
																				<b> ".$TXT_23." <a href='http://localhost/zzchat/src/recoverpass.php?key=".md5($username)."'>
																				".$TXT_24."</a> ".$TXT_25."</b>
																				<br>
																				".$TXT_26."
																			</body>
																		</html>";
													//==========
													 
													//=====boundary creation
													$boundary = "-----=".md5(rand());
													//==========
													 
													//=====Subject.
													$sujet = $TXT_19;
													//=========
													 
													//=====MAil header creation.
													$header = "From: \"WeaponsB\"<zzchat2016@gmail.com>".$passage_ligne;  //motdepasse de l'e-mail : zzchatsimonkillian au cas où ;)
													$header = "Reply-to: \"WeaponsB\"<".$_POST['email'];
													$header.= "MIME-Version: 1.0".$passage_ligne;
													$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
													//==========
													 
													//=====Message creation.
													$message = $passage_ligne."--".$boundary.$passage_ligne;
													//=====Adding the message in HTML
													$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
													$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
													$message.= $passage_ligne.$message_html.$passage_ligne;
													//==========
													$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
													$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
													//==========
													 
													//====Sending the mail.
													mail($mail,$sujet,$message,$header);
													//==========
													echo $TXT_27;
												}
												else
												{
													echo $TXT_28;
												}
											}
										}
									}
									if ($erreur==-1)
									{
										echo $TXT_29;
									}
								}
	                		}
	                		?>
	                	</div>
		                <div class="form-group">
		                  <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder=<?php echo $TXT_4; ?> value="">
		                </div>
		                <div class="form-group">
		                  <input type="text" name="email" id="email" tabindex="2" class="form-control" placeholder=<?php echo $TXT_9; ?>>
		                </div>
		                <div class="form-group">
		                  <div class="row">
		                    <div class="col-sm-6 col-sm-offset-3">
		                        <input type="submit" name="recover-submit" id="recover-submit" tabindex="4" class="form-control btn btn-login" value=<?php echo $TXT_19; ?>>
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
