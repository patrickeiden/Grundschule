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
      $name = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
      $result = printFormforCustome($name);
        if(CustomeOn($_SESSION['u_id']) == 1){
          echo '<div class="costumeModule" onclick="clickedCustome()">
                  <p class="text"> the costume module is currently intergrated on your website</p>
                  <div class="c_text">
                    <p>This module exists in order to change important settings on the custome module</p>
                    <form action="update_site.php" method="POST">
                    <div class="form-group">
                      <p>Change the titel of the nav bar for this module:</p>
                        <input type="text" class="form-control" id="nav_title" placeholder="Title" name="nav_title" value="'.$nav .'">
                    </div>
                    <div class="form-group">'.$result.'
                      <input type ="checkbox" name ="costume_button" value="1"/>
                      <p class="events">Check this Box if you want to include this Module</p>
                      <button type="submit" name="changes" formmethod="POST" value="'.$name.'">Save Changes</button>
                      <button class="go_back "onclick="CustomeBack()" name="backbutton">Go Back</button>
                    </div>
                    </form>
                  </div>
                </div>';
        }
        if(CalendarOn($_SESSION['u_id']) == 1){
          echo '<div class="calendarModule" onclick="clickedCalendar()">
          <p class="text"> the calendar module is currently intergrated on your website</p>
          <div class="k_text">
          <p>This module exists in order to change important settings on the calendar module</p>
          <div class="form-group">
            <input type ="checkbox" name ="calendar_button" value="1"/>
            <p class="events">Check this Box if you want to include this Module</p>
            <button type="submit" name="changes" formmethod="POST" value="lala">Save Changes</button>
            <button class="go_back2" onclick="CalendarBack()" name="backbutton">Go Back</button>
            </div>
          </div>
          </div>';
        }
        if(NewsOn($_SESSION['u_id']) == 1){
          echo '<div class="newsModule" onclick="clickedNews()">
          <p class="text"> the news module is currently intergrated on your website</p>
          <div class="n_text">
            <p>This module exists in order to change important settings on the news module</p>
            <form action="update_site.php" method="POST">
              <div class="form-group">
                <p>With this form you are able to add news</p>
                <input type="text" class="form-control" id="news_title" placeholder="Title" name="news_title">
                <input type="text" class="form-control" id="news_date" placeholder="Date" name="news_date">
                <textarea name="news_text" cols="40" rows="5" id="news_text"></textarea>
                <input type="file" class="form-control" id="news_img" name="news_image" accept="image/*">
                <button type="submit" name="changes_news" formmethod="POST" value="lala">Save Changes</button>
                <button class="go_back3" onclick="NewsBack()" name="backbutton">Go Back</button>
              </div>
            </form>
              <form action="update_site.php" method="POST">
                <div class="form-group">
                  <p>Write the exact name of the titel you want to delete</p>
                  <input type="text" class="form-control" id="delete_news" placeholder="Titel" name="delete_news">
                  <button type="submit" name="delete_news_button" formmethod="POST" value="lala">Delete</button>
                </div>
              </form>
          </div>
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
    var calendar = 0;
    var news = 0;

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
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[0].setAttribute("onclick", "clickedCustome()");
      }

      function clickedCalendar(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="block";
        document.getElementById('page_news').style.display="none";
        document.getElementsByClassName('costumeModule')[0].style.display="none";
        document.getElementsByClassName('newsModule')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[4].removeAttribute("onclick");
      }

      function CalendarBack(){
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementsByClassName('costumeModule')[0].style.display="block";
        document.getElementsByClassName('newsModule')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[4].setAttribute("onclick", "clickedCalendar()");
      }

      function clickedNews(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="block";
        document.getElementsByClassName('costumeModule')[0].style.display="none";
        document.getElementsByClassName('calendarModule')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[7].removeAttribute("onclick");
      }

      function NewsBack(){
        document.getElementById('page_news').style.display="none";
        document.getElementsByClassName('costumeModule')[0].style.display="block";
        document.getElementsByClassName('calendarModule')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[7].setAttribute("onclick", "clickedNews()");
      }


      $(document).ready(function () {

        $(".costumeModule").click(function () {

            if(custome == 0){
              custome = 1;
              $(".costumeModule").animate({height:"542px"},500);
              $(".costumeModule > .text").hide();
            }
            $(".go_back").click(function() {
              custome = 0;
              $(".costumeModule").animate({height:"120px"},500);
              $(".costumeModule > .text").show();
              return false;
            });
          });

          $(".calendarModule").click(function () {

            if(calendar == 0){
              calendar = 1;
              $(".calendarModule").animate({height:"300px"},500);
              $(".calendarModule > .text").hide();
            }
            $(".go_back2").click(function() {
              calendar = 0;
              $(".calendarModule").animate({height:"120px"},500);
              $(".calendarModule > .text").show();
              return false;
            });
          });

            $(".newsModule").click(function () {

              if(news == 0){
                news = 1;
                $(".newsModule").animate({height:"500px"},500);
                $(".newsModule > .text").hide();
              }
              $(".go_back3").click(function() {
                news = 0;
                $(".newsModule").animate({height:"120px"},500);
                $(".newsModule > .text").show();
                return false;
              });
            });
        });
    </script>
    </html>
