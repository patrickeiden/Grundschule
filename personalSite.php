<?php

session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Gruschool</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


 <link rel="stylesheet" type="text/css" href="index.css">
 <link rel="stylesheet" type="text/css" href="LogIn.css">

 <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
 <script src='http://momentjs.com/downloads/moment.js'></script>
 <script src='fullcalendar/fullcalendar.js'></script>

 <script>
   $(document).ready(function() {
       $('#calendar').fullCalendar();
     });
   </script>


<title>Page Title</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/test.php">Gruschool</a>
    </div>
    <?php

        echo '<form action="LogOut_function.php" method="POST">
          <p class="loggedIn"> Logged in with:';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button></li>
      </form> </div>
    </nav>';

    ?>
    <div id="module_container">
      <?php
        if(CustomeOn() == 1){
          echo '<div class="costumeModule" onclick="clickedCustome()">
                  <p> the costume module is currently intergrated on your website</p>
                </div>';
        }
        if(CalendarOn() == 1){
          echo '<div class="calendarModule" onclick="cickedCalendar()">
          <p> the calendar module is currently intergrated on your website</p>
          </div>';
        }
        if(NewsOn() == 1){
          echo '<div class="newsModule" onclick="clickedNews()">
          <p> the news module is currently intergrated on your website</p>
          </div>';
        }
      ?>
    </div>

    <div id="currentPage">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/Grundschule/test.php">Gruschool</a>
          </div>
        </div>
      </nav>
      <div class="page_custome">
        <?php
        echo printCustome();
         ?>
      </div>
      <div class="page_calendar">
        <?php
          echo printCalendar();
        ?>
      </div>
      <div id="page_news">
        <div class="title">
          <?php
            echo returnTitle();
          ?>
        </div>
        <div class="date">
          <?php
            echo returnDate();
          ?>
        </div>
        <div class="text">
          <?php
            echo returnText();
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
      <div class="currentPage_footer">
        <footer class="page-footer font-small blue">

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
          </div>
          <!-- Copyright -->

        </footer>
      </div>
    </div>

    <footer class="page-footer font-small blue">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
      </div>
      <!-- Copyright -->

    </footer>

    </body>
    <script>
      function clickedCustome(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
      }
      function cickedCalendar(){
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
      }
      function clickedNews(){
        document.getElementById('page_news').style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
      }

    </script>
    </html>
