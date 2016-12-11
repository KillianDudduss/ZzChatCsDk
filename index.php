<!DOCTYPE html>
<?php

// First start a session.
session_start();
if (!isset($_SESSION['username']))
{
  $_SESSION['username']="";
}
if (!isset($_SESSION['email']))
{
  $_SESSION['email']="";
}

?>

<html>
 	<head>
    <!-- head-->
		<title> Zz Chat </title>
 		<script type="text/javascript" src="./static/JS/bootstrap.js"></script>
    <script type="text/javascript" src="./static/JS/monjs.js"></script>
    <link rel="stylesheet" type="text/css" href="./static/CSS/bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="./static/CSS/moncss.css">
 	</head>
 	<body>
    <?php $path="./src";
          include($path.'/langchoice.php'); ?>
 		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
	      <!--navbar-->
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
            <li id="login" class="active" onclick="BasculeElement(this);"><a href="#login"><?php echo $TXT_1; ?></a></li>
            <li id="logon" class="" onclick="BasculeElement(this);"><a href="#logon"><?php echo $TXT_2; ?></a></li>
            <li id="contact" class="" onclick="BasculeElement(this);"><a href="#contact"><?php echo $TXT_3; ?></a></li>
	          <li id="fr" type="hidden" class=""><a href="?langue=fr" >FR</a></li>
	          <li id="en" type="" class=""><a href="?langue=en" >EN</a></li>
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
		        <!--error management-->
                  <form class="form" id="#login" action="src/login.php" method="post" role="form" style="display: block;">
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
                        echo $TXT_34;
                      }
                      else
                     {
                        if($erreur>=3)
                        {
                          header('Location: src/forgotpass.php'); //too many errors redirect to forgotpass.php
                        }
                        else
                        {
                          echo $TXT_35.(3-$erreur).$TXT_36;  //erreur1 for good login but bad pass
                        }
                      }
                    }
                    ?>
                    <div class="form-group">
                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder=<?php echo $TXT_4; ?> value=""/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" placeholder=<?php echo $TXT_5; ?> class="form-control"/>
                    </div>
                    <div class="form-group text-center">
                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember"/>
                      <label for="remember"> <?php echo $TXT_6; ?></label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" value=<?php echo $TXT_7; ?> class="form-control btn btn-login" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                            <a href="src/forgotpass.php" tabindex="5" class="forgot-password"> <?php echo $TXT_8; ?> </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="erreur" value="<?php echo $erreur ?>"></input>
                </form>
                <form id="#logon" action="src/logon.php" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder=<?php echo $TXT_4; ?> value="" />
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder=<?php echo $TXT_9; ?> value="" />
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder=<?php echo $TXT_5; ?> />
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirmpass" id="confirmpass" tabindex="2" class="form-control" placeholder=<?php echo $TXT_10; ?> />
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value=<?php echo $TXT_11; ?> >
                      </div>
                    </div>
                  </form>
                  <div class="form-group" id="#contact" style="display: none;">
                    contact corps;
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
