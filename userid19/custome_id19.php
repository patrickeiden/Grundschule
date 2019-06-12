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
      background-color: #AC3B61!important;
      height: 74px;
      text-align: left;
    }
    ul{margin-bottom: 0px; padding: 23px; display: -webkit-inline-box;     list-style-type: none;}
    li {width: 34%;}

    .Title {
      font-size: 27px;
      margin-top: 5px;
    }
    .logo{height: 100%; width: 50%;}
    .fill{height:50px;}

    p {
      margin-bottom: 0px;
    }
    .NewsButton{
    width: 50%;
    background-color: #AC3B61!important;
    border-color: #AC3B61;
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

    ul a:hover {
      color: white;
      border-style:none!important;
    }
    .innerNews{
    background-color: mintcream;
    border-radius: 5px 5px 5px 5px;
    }

   img {
      height: 100%; 
      width: 100%;
    }
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #AC3B61!important;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: 4px;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {}

.dropdown:hover .dropdown-content {
  display: block;
}
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
   <div class="col-sm-2"></div>
    <div id="firstheader">
     <div class="Title col-sm-4">
    	<p class="name">Grundschule Üdersdorf</p> 
     </div> 
     <div class="col-sm-3 text-left">        
       <img class="logo" src="../Images/Logo_grundschule.jpg" alt="Smiley face"  height="170" width="170">       
     </div>  
   </div> 
 </div><div class="row text-center red">
  		<div class="col">
  			<nav class="navbar2">
  			      <ul style="list-style-type: none;">
              <li><a href="../userid19/frontpageUser19.php"><span class="glyphicon glyphicon-home"></span> Home</a></li><li><a  class="custome" href="../userid19/custome_id19.php"><span class="glyphicon glyphicon-star"></span>Tes</a></li><li><a href="../userid19/calendar_id19.php"><span class="glyphicon glyphicon-calendar"></span> Events</a></li><li><a href="../userid19/news_id19.php"><span class="glyphicon glyphicon-globe"></span> Neuigkeiten</a></li><li><a href="../userid19/gallery_id19.php"><span class="glyphicon glyphicon-picture"></span> Galerie</a></li><li class="dropdown">
                        <a href="javascript:void(0)"><span class="glyphicon glyphicon-picture"></span> Organisation</a>
                        <div class="dropdown-content"><a href="../userid19/workers_id19.php"><span class="glyphicon glyphicon-th"></span> Mitarbeiter</a><a href="../userid19/anfahrt_id19.php"><span class="glyphicon glyphicon-map-marker"></span> Anfahrt</a><a href="../userid19/impressum_id19.php"><span class="glyphicon glyphicon-road"></span> Impressum</a></div></li></ul>
            </nav>
          </div>
        </div><div class="custome_Jesus ">Hallo, my name is peter, nice uzzz</div><div class="custome_seperat">lululu</div><div class="custome_brecher"><p>ich bin cool!</p>, ich nicht</div><div class="row">           <footer class="page-footer">              <div class="container-fluid">               <div class="row">                 <div class="col-sm-3">                 </div>                 <div class="col-sm-4">                    <p>Adresse:</br><span class="street">Pal-Street</span></br> <span class="plz">66125</span></br><span class="ort">Paldorf</span></p>
                </div>
                <div class="col-sm-4">
                  <p><span class="tel">Tel:0000</span></br><span class="fax">Fax:00002</span></br> <span class="mail">E-Mail:Mustermail@muster.com</span></p> 
                </div>
              </div> 
            </div> 
          </footer>
        </div> 
      </div>
    </body>
</html>