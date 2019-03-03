<?php include '../functions.php'; session_start(); ?><!DOCTYPE html>
<html lang="en">
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
    	<p class="name">Grundschule Losheim am See</p> 
     </div> 
     <div class="col-sm-3 text-left">        
       <img class="logo" src="Images/Logo_grundschule.jpg" alt="Smiley face"  height="170" width="170">       
     </div>  
   </div> 
 </div><div class="row text-center">
  		<div class="col">
  			<nav class="navbar2">
          <div class="col-sm-3"></div>
  			      <ul class="nav navbar-nav pull-sm-left">
              <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li><li><a href="#"><span class="glyphicon glyphicon-star"></span>test</a></li><li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Events</a></li><li><a href="#"><span class="glyphicon glyphicon-globe"></span>Neuigkeiten</a></li><li><a href="#"><span class="glyphicon glyphicon-picture"></span>Gallerie</a></li></ul>
            </nav>
          </div>
        </div><div class="row">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">       
            <ol class="carousel-indicators">         
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>         
              <li data-target="#myCarousel" data-slide-to="1"></li>       
            </ol>       
            <div class="carousel-inner">         
              <div class="item active">           
                <img src="Images/klasse.jpg">         
              </div>         
              <div class="item">           
                <img src="Images/grundschule.jpg">         
              </div>       
            </div>         
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">           
              <span class="glyphicon glyphicon-chevron-left"></span>           
              <span class="sr-only">Previous</span>         
            </a>         
            <a class="right carousel-control" href="#myCarousel" data-slide="next">           
              <span class="glyphicon glyphicon-chevron-right"></span>           
              <span class="sr-only">Next</span>         
            </a>       
          </div>     
        </div>     
        <div class="row">       
          <div class="col-sm-3"></div>   	    
          <div class="col-sm-6 text-center">           
            <hr>   	      
            <h3 class="header">Neueröffnung </h3>
            <p class="description">Ich wiederhole mich nur ungerne </p>
            <hr>
          </div>
        </div>
        <div class="row">
          <footer class="page-footer"> 
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-4"> 
                  <p>Adresse:</br><span class="street">Theodor-Storm-Straße 30</span></br> <span class="plz">66679</span></br><span class="ort">Losheim</span></p>
                </div>
                <div class="col-sm-4">
                  <p><span class="tel">Tel:98093824</span></br><span class="fax">Fax:320490342</span></br> <span class="mail">E-Mail:Schule@losheim.de</span></p> 
                </div>
              </div> 
            </div> 
          </footer>
        </div> 
      </div>
    </body>
</html>