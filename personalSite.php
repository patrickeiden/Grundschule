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


 <link rel="stylesheet" type="text/css" href="Css_Files/index.css">
 <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">

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
      $nav = printCustomeTitel($_SESSION['u_id']);
        if(CustomeOn($_SESSION['u_id']) == 1){
          echo '<div class="costumeModule" onclick="clickedCustome()">
                  <p class="text"> the costume module is currently intergrated on your website</p>
                  <div class="c_text">
                    <p>This module exists in order to change important settings on the custome module</p>
                    <div class="form-group">
                      <p>Change the titel of the nav bar for this module:</p>
                        <input type="c_text" class="form-control" id="nav_title" placeholder="Title" name="nav_title" value="'.$nav .'">
                    </div>
                    <div class="form-group">
                      <p>Code</p>
                      <textarea name="code" cols="40" rows="5" id="code"></textarea>
                      <input type ="checkbox" name ="costume_button" value="1"/>
                      <p class="events">Check this Box if you want to include this Module</p>
                      <button onclick="CustomeBack()" name="backbutton">Go Back</button>
                    </div>

                  </div>
                </div>';
        }
        if(CalendarOn($_SESSION['u_id']) == 1){
          echo '<div class="calendarModule" onclick="clickedCalendar()">
          <p class="text"> the calendar module is currently intergrated on your website</p>
          </div>';
        }
        if(NewsOn($_SESSION['u_id']) == 1){
          echo '<div class="newsModule" onclick="clickedNews()">
          <p class="text"> the news module is currently intergrated on your website</p>
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
      <div class="page_main">
        <?php
        echo returninterfacecode();
         ?>
      </div>
      <div class="page_custome">
        <?php
        echo printCustome($_SESSION['u_id']);
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
              echo returnNewsImage();
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
    var custome = 0;

      function empty(){

      }

      function clickedCustome(){
          document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="block";
          document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
          document.getElementById('page_news').style.display="none";
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          document.getElementsByClassName('newsModule')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px!important";
          document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="block";
          document.getElementById('module_container').getElementsByTagName('div')[0].removeAttribute("onclick");
      }

      function CustomeBack(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementsByClassName('calendarModule')[0].style.display="block";
        document.getElementsByClassName('newsModule')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px!important";
        document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[0].setAttribute("onclick", "clickedCustome()");
      }

      function clickedCalendar(){
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        if(document.getElementsByClassName('costumeModule')[0].style.display=="none" && document.getElementsByClassName('newsModule')[0].style.display=="none"){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          document.getElementsByClassName('newsModule')[0].style.display="block";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="-20px";
        }else{
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          document.getElementsByClassName('newsModule')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="80px";
        }
      }
      function clickedNews(){
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('page_news').style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        if(document.getElementsByClassName('calendarModule')[0].style.display=="none" && document.getElementsByClassName('costumeModule')[0].style.display=="none"){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="-20px";
        }else{
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="80px";
        }
      }


      $(document).ready(function () {

        $(".costumeModule").click(function () {

            if(custome == 0){
              custome = 1;
              $(".costumeModule").animate({height:"350px"},500);
              $(".costumeModule > .text").hide();
            }
            $(":button").click(function(){
              custome = 0;
              $(".costumeModule").animate({height:"120px"},500);
              $(".costumeModule > .text").show();
              return false;
            });
          });

          $(".calendarModule").click(function () {

              if($(".text").css('display') == 'none'){
                $(".text").show();
                $(".calendarModule").animate({height:"120px"},500);
              }else{
                $(".calendarModule").animate({height:"300px"},500);
                $(".text").hide();
              }
            });

            $(".newsModule").click(function () {

                if($(".text").css('display') == 'none'){
                  $(".text").show();
                  $(".newsModule").animate({height:"120px"},500);
                }else{
                  $(".newsModule").animate({height:"300px"},500);
                  $(".text").hide();
                }
              });
        });
    </script>
    </html>
