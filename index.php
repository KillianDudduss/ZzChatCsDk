<!DOCTYPE html>
<?php

//include("src/login.php");

// First start a session.
session_start();

// Check to see if this run of the script was caused by our login submit button being clicked.
if (isset($_POST['login-submit']))
{
  // Also check that our usename and password were passed along. If not, jump
  // down to our error message about providing both pieces of information.
  if (isset($_POST['username']) && isset($_POST['password'])) 
  {
    login($username,$password);
  }
}
?>



<html>
 	<head>
 		<title> Zz Chat </title>
 		<script type="text/javascript" scr="static/js/bootstrap.js"></script>
 		<link rel="stylesheet" type="text/css" href="static/CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="static/CSS/monCSS.css">
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
            <li  class="active"><a href="#connect">Se connecter</a></li>
            <li><a href="#logon">S'inscrire</a></li>
            <li><a href="#contact">Contacter</a></li>
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
                <a href="#connect" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#subscribe" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form-link" action="src/login.php" method="post" role="form" style="display: block;">
                  <?php
                  if(!isset($_GET["erreur"])) 
                  { 
                    $erreur=-1;
                  }
                  else
                  {
                    $erreur = $_GET["erreur"];
                    if ($erreur==-1)
                    {
                      echo "Votre login est inconnu, inscrivez vous avant de chatter avec les autres ZZ";
                    }
                    else
                    {
                      if($erreur>=3)
                      {
                        echo "redirection a faire vers une page avec un delai d'attente"; //nombre d'erreur trop grand 
                      }
                      else
                      {
                        echo "Votre mot de passe est incorrect, il vous reste ".(3-$erreur)." tentatives";  //erreur1 pour login mais mauvais mdp
                      }
                    }
                  }
                  ?>
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Identifiant" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de Passe">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Se souvenir de moi</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="src/forgotpass.php" tabindex="5" class="forgot-password"> Mot de Passe oublié ?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="erreur" value="<?php echo $erreur ?>"></input>
                </form>
                <form id="register-form-link" action="src/logon.php" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirmpass" id="confirmpass" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
