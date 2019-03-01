<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>

    .navbar {
      background-color: rgb(101, 161, 223)!important;
    }

    p {
      margin-bottom: 0px;
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

    img {
      height: 100%;
    }

  </style>
</head>


<body>

<div class="container-fluid">

  <div class="row">

    <?php include('menu.php'); ?>

  </div>

  <div class="row">
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
	      <h3>Text über Schule</h3>
	      <p>Die Grundschule Saarbrücken-Dellengarten liegt in der Kernstadt von Saarbrücken im historischen Stadtteil Alt-Saarbrücken. Sie ist seit 1980 im heute fast 100jährigen Gebäude der ehemaligen Hauptschule Dellengarten untergebracht; seit 1990 bewohnt sie dieses herrschaftliche Schulhaus mit großzügigem Raumangebot alleine.

        Umgeben ist das Gebäude von einem Außengelände, das seit 2006 kontinuierlich zum attraktiven Schulhof umgestaltet wurde und allen Kindergruppen intensive Spiel- und Bewegungsmöglichkeiten bietet.

        Unsere 3-zügige Schule besuchen ca. 250 Kinder aus 25 verschiedenen Nationen. Dabei werden sie von einem Lehrerteam unterrichtet, das sich aus GrundschullehrerInnen, FörderschullehrerInnen und Lehrerinnen mit Zusatzqualifikationen besteht. Außerdem werden die Schüler im Rahmen der Gebundenen Ganztagsschule von einem Team des Sozialpädagogischen Bereichs begleitet. Darüber hinaus steht den Kindern ein integrierter Hort (bis 18 Uhr) zur Verfügung.</p>
	      <hr>
     </div>

  </div>

  <div class="row">

  		<footer class="page-footer">

         <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3"></div>
      		  <div class="col-sm-4">
              <p>Adresse:</br>
              Schulstr. 100</br>
              66133 Saarbrücken</p>  
            </div>
            <div class="col-sm-4">
              <p>Tel.0681 / 12345</br>
              Fax: 0681 / 12335:</br>
              E-Mail: schule@gmail.com</p>  
            </div>
          </div>
        </div>
  		</footer>

  </div>


</div>


</body>
</html>
