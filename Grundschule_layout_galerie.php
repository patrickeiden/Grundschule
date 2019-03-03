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
      background-color: green!important;
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

  </style>
</head>


<body>

<div class="container-fluid">

  <div class="row">

  	<?php include('menu.php'); ?>

  </div>

</br>

<div class="container">

  <hr>
    <h1 class="text-center">Galerie</h1>
  <hr>

  <div class="row">

    <div class="col-md-4">
      <div class="thumbnail">
        <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
        </a>
        <div class="caption">
          <p>Bild 1</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
          </a>
          <div class="caption">
            <p>Bild 2</p>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
          </a>
          <div class="caption">
            <p>Bild 3</p>
          </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
          </a>
          <div class="caption">
            <p>Bild 4</p>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
          </a>
          <div class="caption">
            <p>Bild 5</p>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="Images/Ostseekinder_02.jpg" data-size="1600x1067">
          <img src="Images/Ostseekinder_02.jpg" style="width:100%">
          </a>
          <div class="caption">
            <p>Bild 6</p>
          </div>
      </div>
    </div>
  </div>

</div>

</div>

</br>

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
