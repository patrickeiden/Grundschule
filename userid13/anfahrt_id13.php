<?php include '../functions.php'; session_start(); ?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <title>PAL School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><style>

        .navbar2 {
      background-color: rgb(101, 161, 223)!important;
      padding: 10px;
      margin-bottom: 0px;
      height: 74px;
    }

    .Title {
      font-size: 27px;
      margin-top: 5px;
    }

    p {
      margin-bottom: 0px;
    }

    .glyphicon {
      color: white;
      font-size: 18px;
    }

    .carousel-inner{
      height: 600px;
    }

    p, a, h1{
    	font-family: "Open Sans",sans-serif;
    }

    a {
    	color: white;
    	font-size: 20px;
    }

    footer {
      background-color: #555;
      color: white;
      padding: 40px;
    }

    ul.nav a:hover {
      color: white !important;
      background-color: transparent !important;
    }


    img {
      height: 100%;
    }

  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
   <div class="col-sm-2"></div>
    <div id="firstheader">
     <div class="Title col-sm-4">
    	<p class="name">Grundschjjule Losheim am See</p> 
     </div> 
     <div class="col-sm-3 text-left">        
       <img class="logo" src="Images//Logo_grundschule.jpg" alt="Smiley face"  height="170" width="170">       
     </div>  
   </div> 
 </div><div class="row text-center">
  		<div class="col">
  			<nav class="navbar2">
          <div class="col-sm-3"></div>
  			      <ul class="nav navbar-nav pull-sm-left">
              <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li><li><a href="../userid13/custome_id13.php"><span class="glyphicon glyphicon-star"></span>lala</a></li><li><a href="../userid13/calendar_id13.php"><span class="glyphicon glyphicon-calendar"></span>Events</a></li></ul>
            </nav>
          </div>
        </div><?php $file = "userid".$_SESSION["u_id"]."/anfahrt_id".$_SESSION["u_id"].".php";echo allAnfahrtFiles($_SESSION["u_id"], $file); ?>"<div class="row">           <footer class="page-footer">              <div class="container-fluid">               <div class="row">                 <div class="col-sm-3">                 </div>                 <div class="col-sm-4">                    <p>Adresse:</br><span class="street">Musterstrasse</span></br> <span class="plz">66666</span></br><span class="ort">Musterort</span></p>
                </div>
                <div class="col-sm-4">
                  <p><span class="tel">Tel:00000</span></br><span class="fax">Fax:00001</span></br> <span class="mail">E-Mail:Mustermail@muster.de</span></p> 
                </div>
              </div> 
            </div> 
          </footer>
        </div> 
      </div>
    </body>
</html>