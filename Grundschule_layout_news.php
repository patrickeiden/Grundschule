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
      background-color: red!important;
    }

    p {
      margin-bottom: 0px;
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

    .card-img-top {
      height: 350px;
    }

    .glyphicon-calendar{
      color: black!important;
      font-size: 14px!important;
    }

    .gross{
      font-size: 20px;
    }

  </style>
</head>


<body>

<div class="container-fluid">

  <div class="row">

  	<?php include('menu.php'); ?>

  </div>

  <div class="row">

    <div class="col-sm-3"></div>
	    <div class="col-sm-6 text-center">
        <hr>
          <div>
            <h1>Neuigkeiten:</h1>
            <hr>
            <img src="Images/Ostseekinder_02.jpg" class="card-img-top text-center">
            <div>
              <p><span class="gross">Elterninfo 4 </span><span class="glyphicon glyphicon-calendar"></span> 10.10.19</p>
              <p class="text-left">Liebe Eltern!
              Wir begrüßen Sie im neuen Jahr und wünschen Ihnen und Ihren Familien alles Gute und viel Gesundheit.
              Wir starten das neue Halbjahr mit einigen Neuerungen, welche die Verzahnung zwischen SPB und Schule
              betreffen, über die Sie auf den Elternabenden im Februar informiert wurden/werden.
              Neu im Lehrerteam begrüßen wir auch Herrn Thorsten Haug, der die Klasse 2.1 von Frau Jennifer Linz
              übernommen hat.
              Frau Linz danken wir herzlich für Ihre Arbeit an unserer Schule und wünschen ihr privat und beruflich alles
              Gute. Unserer Erzieherin, Charlotte Kammer, gratulieren wir zu ihrem Baby und wünschen ihr und dem
              frischgebackenen Papa eine schöne Elternzeit. </p>
            </div>
          </div>
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
