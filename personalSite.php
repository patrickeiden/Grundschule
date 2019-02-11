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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <link rel="stylesheet" type="text/css" href="Css_Files/index.css">
 <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">
 <link rel="stylesheet" type="text/css" href="Css_Files/page_main.css">

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
        if(CustomeOn($_SESSION['u_id']) == 1){
          $nav1 = printCustomeTitel($_SESSION['u_id']);
          $name1 = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
          $result1 = printFormforCustome($name1);
          echo '<div class="costumeModule" onclick="clickedCustome()">
                  <p class="text"> the costume module is currently intergrated on your website</p>
                  <div class="c_text">
                    <p>This module exists in order to change important settings on the custome module</p>
                    <form action="update_site.php" method="POST">
                    <div class="form-group">
                      <p>Change the titel of the nav bar for this module:</p>
                        <input type="text" class="form-control" id="nav_title" placeholder="Title" name="nav_title" value="'.$nav1 .'">
                    </div>
                    <div class="form-group">'.$result1.'
                      <p>add a Module</p>
                      <p>Title:</p>
                      <input type="text" class="form-control" id="title" placeholder="Title" name="custome_title">
                      <p>Code</p>
                      <textarea name="custome_code" cols="40" rows="5" class="code"></textarea>
                      <button type="submit" name="newModule" formmethod="POST" value="'.$name1.'">add a new Module</button>
                      <button type="submit" name="delete" formmethod="POST" value="'.$name1.'">delete Modules</button>
                      <button type="submit" name="changes" formmethod="POST" value="'.$name1.'">Save Changes</button>
                      <button class="go_back "onclick="CustomeBack()" name="backbutton">Go Back</button>
                    </div>
                    </form>
                  </div>
                </div>';
        }
        if(CalendarOn($_SESSION['u_id']) == 1){
          $name2 = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
          $result2 = printFormforCustome($name2);
          echo '<div class="calendarModule" onclick="clickedCalendar()">
                  <p class="text"> the calendar module is currently intergrated on your website</p>
                  <div class="k_text">
                    <p>This module exists in order to change important settings on the calendar module</p>
                    <form action="update_site.php" method="POST">
                      <div class="form-group">'.$result2.'
                        <p>add a Module</p>
                        <p>Title:</p>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="calendar_title">
                        <p>Code</p>
                        <textarea name="calendar_code" cols="40" rows="5" class="code"></textarea>
                        <button type="submit" name="newModuleabove" formmethod="POST" value="'.$name2.'">add a new Module above the calendar</button>
                        <button type="submit" name="newModuleunder" formmethod="POST" value="'.$name2.'">add a new Module under the calendar</button>
                        <button type="submit" name="delete2" formmethod="POST" value="'.$name2.'">delete Modules</button>
                        <button type="submit" name="changes_calendar" formmethod="POST" value="'.$name2.'">Save Changes</button>
                        <button class="go_back2" onclick="CalendarBack()" name="backbutton">Go Back</button>
                      </div>
                    </form>
                  </div>
                </div>';
        }
        if(NewsOn($_SESSION['u_id']) == 1){
          $name3 = oneValueFromTableData($_SESSION['u_id'], "news_file_name");
          $result3 = printFormforNews($_SESSION['u_id'], $name3);
          if(sizeof($result3) == 0){
            array_push($result3, "");
          }
          $string = '';
          for ($i=0; $i < sizeof($result3)-1; $i++) {
            $string .= $result3[$i];
          }
          echo '<div class="newsModule" onclick="clickedNews()">
          <p class="text"> the news module is currently intergrated on your website</p>
          <div class="n_text">
            <p>This module exists in order to change important settings on the news module</p>
            <form action="update_site.php" method="POST">
              <div class="form-group">'.$string.'
                <p>With this form you are able to add news</p>
                <input type="text" class="form-control" id="news_title" placeholder="Title" name="news_title">
                <input type="text" class="form-control" id="news_date" placeholder="Date" name="news_date">
                <textarea name="news_text" cols="40" rows="5" id="news_text"></textarea>
                <input type="file" class="form-control" id="news_img" name="news_image" accept="image/*">
                <button type="submit" name="newNews" formmethod="POST" value="'.$name3.'">add new News</button>
                <button type="submit" name="changes_news" formmethod="POST" value="'.$name3.'">Save Changes</button>
                <button type="submit" name="delete_news_button" formmethod="POST" value="'.$name3.'">Delete</button>
                <button class="go_back3" onclick="NewsBack()" name="backbutton">Go Back</button>
              </div>
            </form>
            <button name="left" value="'.$name3.'" class="left" >Left</button>
            <button name="right" value="'.$name3.'" class="right" >Right</button>
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
        if(CustomeOn($_SESSION['u_id']) == 1){
          echo printCustomeInInterface($_SESSION['u_id']);
          echo printInterfacefooter();
        }
         ?>
      </div>
      <div class="page_calendar">
        <?php
        if(CalendarOn($_SESSION['u_id']) == 1){
          echo printCalendarInterface();
          echo printInterfacefooter();
        }
        ?>
      </div>
      <div id="page_news">
        <?php
        if(NewsOn($_SESSION['u_id']) == 1){
          $fileinterface = oneValueFromTableData($_SESSION['u_id'], "news_file_name");
          $var = printNewsInterface($_SESSION['u_id'], $fileinterface);
          echo $var[0];
          echo printInterfacefooter();
        }
        ?>
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
    var leftright = 1;
    <?php
    if(CustomeOn($_SESSION['u_id']) == 1){
      echo 'var customeon = 1;';
    }else{
      echo 'var customeon = 0;';
    }

    if(CalendarOn($_SESSION['u_id']) == 1){
      echo 'var calendaron = 1;';
    }else{
      echo 'var calendaron = 0;';
    }

    if(NewsOn($_SESSION['u_id']) == 1){
      echo 'var newson = 1;';
      $leftright = 1;
      $jsname = oneValueFromTableData($_SESSION['u_id'], "news_file_name");
      $jsresult = printFormforNews($_SESSION['u_id'], $jsname);
      $jsnumber = numberofNews("title", $jsname, "new_news", "news_file");
      $jstable_data = oneValueFromTableData($_SESSION['u_id'], "news_number");
      $jsinterface = printNewsInterface($_SESSION['u_id'], $jsname);
      echo $jsinterface[1];
      //$jsnewsright = right($leftright, $jsnumber, $jstable_data);
      //$jsnewsleft = left($leftright, $jsnumber, $jstable_data);
      echo $jsresult[sizeof($jsresult)-1];
      echo 'var number ='.$jsnumber.';';
      echo 'var news_number ='.$jstable_data.';';
      echo 'var loop_number ='.ceil($jsnumber/$jstable_data).';';
    }else{
      echo 'var newson = 0;';
    }
    ?>

      function clickedCustome(){
          document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="block";
          document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
          document.getElementById('page_news').style.display="none";
          if(calendaron == 1){
            document.getElementsByClassName('calendarModule')[0].style.display="none";
          }
          if(newson == 1){
            document.getElementsByClassName('newsModule')[0].style.display="none";
          }
          document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px!important";
          document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="block";
          document.getElementById('module_container').getElementsByTagName('div')[0].removeAttribute("onclick");
          document.getElementsByClassName('page-footer')[0].style.top="400px";
          document.getElementById('currentPage').style.marginTop="-542px";
      }

      function CustomeBack(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[0].setAttribute("onclick", "clickedCustome()");
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').style.marginTop="-400px";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="0px";
      }

      function clickedCalendar(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="block";
        document.getElementById('page_news').style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[4].removeAttribute("onclick");
        document.getElementById('currentPage').style.marginTop="-1020px";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="0px";
      }

      function CalendarBack(){
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[4].setAttribute("onclick", "clickedCalendar()");
        document.getElementById('currentPage').style.marginTop="-420px";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="0px";
      }

      function clickedNews(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="block";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[7].removeAttribute("onclick");
        document.getElementsByClassName('page-footer')[0].style.top="1200px";
      }

      function NewsBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('page_news').style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('navbar')[0].style.top="30px";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[7].setAttribute("onclick", "clickedNews()");
      }


        $(document).ready(function () {
          $(".costumeModule").click(function () {
            if(custome == 0){
              custome = 1;
              $(".costumeModule").animate({height:"809px"},500);
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
              $(".calendarModule").animate({height:"950px"},500);
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

//left and right show the next page of the news
            $(".left").click(function () {
              if(leftright > 1){
                leftright--;
                for (var i = 0; i < loop_number; i++) {
                  if(i+1 == leftright){
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).show();
                    $("#page_news > "+".newsInterface"+lar).show();
                  }else{
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).hide();
                    $("#page_news > "+".newsInterface"+lar).hide();
                  }
                }
              }
            });

            $(".right").click(function () {
              if(leftright < loop_number){
                leftright++;
                for (var i = 0; i < loop_number; i++) {
                  if(i+1 == leftright){
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).show();
                    $("#page_news > "+".newsInterface"+lar).show();
                  }else{
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).hide();
                    $("#page_news > "+".newsInterface"+lar).hide();
                  }
                }
              }
            });
          });


    </script>
    </html>
