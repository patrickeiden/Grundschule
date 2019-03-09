<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Css_Files/layout.css" media="screen" />
</head>


<body>

<div class="container-fluid">


    <?php include('menu.php'); ?>


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

  <div class="container">

    <hr>
      <h1 class="text-center">Unsere Schule</h1>
    <hr>

    <div class="row">

        <div class="col-sm-2"></div>
  	    <div class="col-sm-8">

  	      <p class="text-center">Mitten in Saarbücken bietet die Freiwillige Ganztagsgrundschule Saarbrücken Übersdorf ihren rund 180 Schülerinnen und Schülern vielzählige Möglichkeiten, mit Freude zu lernen und Schulleben mitzugestalten.
          Kinder lernen unterschiedlich schnell und benötigen dafür unterschiedliche Lernwege und Lernstrategien. Wir wollen allen Schülern im Sinne der Inklusion ermöglichen, am Unterricht mit Freude und Erfolg teilzunehmen. Dies geschieht, indem wir die Kinder entsprechend dem Grad ihrer Entwicklung individuell fördern. Durch Differenzierung im Unterricht fördern wir Schwächen und fordern Stärken.
          </p>

	      <hr>
     </div>

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
              E-Mail: schule@gmail.com</br>
              <a href="Grundschule_layout_impressum.php" class="impressum">Impressum</a>
              </p>
            </div>
          </div>
        </div>
  		</footer>

  </div>


</div>


</body>
</html>
