<?php
  include "functions.php";
 ?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>


    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      background-color: orange;
      padding: 10px;
      margin-bottom: 5px;
    }

    .Title {
    	color: orange;
    }

    .glyphicon {
    	color: orange;
    }

    p, a, h1{
    	font-family: 'Poppins', sans-serif;
    }

    .container{
    	background-color: orange;
    }

    a {
    	color: white;
    	font-size: 20px;
    	text-transform: uppercase;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;

    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    img {
    height: 100%;
    }
  </style>
</head><body>

<div class="row text-center">
  <div class="col-sm-2"></div>
		<div class="col-sm-8 text-left">
		<h1 class="Title">Grundschule PAL</h1>
		<!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a> -->
		</div>
</div>
<div class="row">
  <div class="col-sm-2">
          </div>
		<div class="col-sm-8">
			<nav class="navbar">
			  <div class="container-fluid">
			      <ul class="nav navbar-nav">
			        <li><a href="http://localhost/Grundschule/designLaura_schule.html">Startseite</a></li>
			        <li><a href="http://localhost/Grundschule/designLaura_schule_info.html">Klassen</a></li>
			        <li><a href="http://localhost/Grundschule/designLaura_schule_events.html">Events</a></li>
			      </ul>
			  </div>
			</nav>
		</div>
</div>
  <div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8">
		      <img src="http://localhost/Grundschule/Ostseekinder_02.jpg" height="800" width="100%">
        </div>
  </div>
<div class="row">
		<div class="container-fluid text-center">
		  <div class="row content">
			    <div class="col-sm-2"></div>
				  <div class="col-sm-8 text-left">
			      <h1>Welcome</h1>
			      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			      <hr>
			      <h3>Test</h3>
			      <p>Lorem ipsum...</p>
				  </div>
        <div class="col-sm-2"></div>
		  </div>
		</div>
    <div class="col-sm-2"></div>
    <div class="col-sm-8 text-left">  		<footer class="container-fluid text-center">
  		  <p>Footer Text</p>
  		</footer>
    </div>
</div>


</body>
</html>
