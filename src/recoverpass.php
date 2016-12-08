<!DOCTYPE html>
<html>
 	<head>
 		<title> Zz Chat </title>
 		<script type="text/javascript" src="./../static/JS/bootstrap.js"></script>
    <script type="text/javascript" src="./../static/JS/monjs.js"></script>
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
            <li id="login" class="active" onclick="BasculeElement(this);"><a href="#recover">Récupérer mot de passe</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-login">
           <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                  <form class="form" id="#recover" action="./recovermod.php" method="post" role="form" style="display: block;">
                    <?php
                    if(isset($_GET["erreur"])) 
                    {
                      $erreur = $_GET["erreur"];
                      if ($erreur==-1)
                      {
                        echo "Le lien est invalide.<br>";
                      }
                      else
                      {
                        echo "Le mot de passe et la confirmation ne correspondent pas.<br>";
                        $erreur=-1;
                      }
                    }
                    ?>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="1" class="form-control" placeholder="Mot de Passe"/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirmpass" id="confirmpass" tabindex="2" class="form-control" placeholder="Mot de Passe"/>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="recover-submit" id="recover-submit" tabindex="4" class="form-control btn btn-login" value="Récupérer mot de passe"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="key" value="<?php echo $_GET['key'] ?>"></input>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>