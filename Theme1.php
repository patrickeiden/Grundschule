<?php
  include "functions.php";
 ?>

<html>
<head>
  <title>Gruschool</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
  <script src='http://momentjs.com/downloads/moment.js'></script>
  <script src='fullcalendar/fullcalendar.js'></script>

  <script>
  	$(document).ready(function() {
  			$('#calendar').fullCalendar();
  		});
  	</script>

  <link rel="stylesheet" type="text/css" href="index.css">
<title>Page Title</title>
</head>
<body>
<div id="news">
  <div class="title">
    <?php
      echo returnNewsTitle();
    ?>
  </div>
  <div class="date">
    <?php
      echo returnNewsDate();
    ?>
  </div>
  <div class="text">
    <?php
      echo returnNewsText();
    ?>
  </div>
  <div class="row">
    <div class="col">
      <?php
        echo returnImage();
      ?>
    </div>
</div>
</div>

  <?php
    echo printCalendar();
  ?>

<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
  </div>
  <!-- Copyright -->

</footer>

</body>
</html>
