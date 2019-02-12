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
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">Gruschool</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Personal Site</a>

    </div>
    <?php

        echo '<form action="fun_exe/LogOut_function.php" method="POST">
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
          echo printCalendarInInterface($_SESSION['u_id']);
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
    //number of entrys in custome module for different files in order to scale the site
    $customename = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
    $calendarname = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
    $numbercustome = numberCostume($_SESSION['u_id'], $customename);
    $numbercalendar = numberCostume($_SESSION['u_id'], $calendarname);
    echo 'var calendarnumber ='.$numbercalendar.';';
    echo 'var customenumber ='.$numbercustome.';';

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
      echo 'var newsnumber = 0;';
      echo $jsresult[sizeof($jsresult)-1];
      echo 'var number ='.$jsnumber.';';
      echo 'var news_number ='.$jstable_data.';';
      echo 'var loop_number ='.ceil($jsnumber/$jstable_data).';';
    }else{
      echo 'var newson = 0;';
    }
    ?>

    //evaluates the number of news that are currently shown on the side and makes the page look good
    function newsdesign(){
      if(loop_number == leftright){
        if(number % news_number == 0 && number >= news_number){
          newsnumber = news_number;
        }else{
          newsnumber = number % news_number;
        }
      }
      if(number == 0){
        newsnumber = number;
      }else if(loop_number != leftright){
        newsnumber = news_number;
      }
    }

    var sumup = customeon+calendaron+newson;
    var marginTopCurrentPage = 0;
    if(sumup>1){
       marginTopCurrentPage = ((-sumup+1)*140)-120;
    }

    document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";

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
          document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="block";
          document.getElementById('module_container').getElementsByTagName('div')[0].removeAttribute("onclick");
          var curr = -554 - (206*customenumber);
          var foot = 500 + (206*customenumber);
          document.getElementById('currentPage').style.marginTop=curr+"px";
          document.getElementsByClassName('page-footer')[0].style.top=foot+"px";

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
        document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[0].setAttribute("onclick", "clickedCustome()");
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        var temp = marginTopCurrentPage;
        document.getElementById('currentPage').style.marginTop=temp+"px";
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
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="block";
        var curr = -548 + (-206*calendarnumber);
        document.getElementById('currentPage').style.marginTop=curr+"px";
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
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[4].setAttribute("onclick", "clickedCalendar()");
        document.getElementById('currentPage').style.marginTop="-420px";
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedNews(){
        newsdesign();
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
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[7].removeAttribute("onclick");
        var curr = -511 - (402*newsnumber);
        var foot = 460 + (402*newsnumber);
        document.getElementById('currentPage').style.marginTop=curr+"px";
        document.getElementsByClassName('page-footer')[0].style.top=foot+"px";
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
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[7].setAttribute("onclick", "clickedNews()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }


        $(document).ready(function () {
          $(".costumeModule").click(function () {
            if(custome == 0){
              custome = 1;
              var temp = 554+(customenumber*206);
              $(".costumeModule").animate({height:temp+"px"},500);
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
              var temp = 528 + (calendarnumber*208);
              $(".calendarModule").animate({height:temp+"px"},500);
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
                var temp = 511 + (newsnumber*402);
                $(".newsModule").animate({height:temp+"px"},500);
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
                newsdesign();
                for (var i = 0; i < loop_number; i++) {
                  if(i+1 == leftright){
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).show();
                    $("#page_news > "+".newsInterface"+lar).show();
                    var temp = 511 + (newsnumber*402);
                    var curr = -511 - (402*newsnumber);
                    var foot = 460 + (402*newsnumber);
                    $(".newsModule").animate({height:temp+"px"},500);
                    $(".page-footer").css('top',foot);
                    $("#currentPage").css('margin-top',curr);
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
                newsdesign();
                for (var i = 0; i < loop_number; i++) {
                  if(i+1 == leftright){
                    var la = i+1;
                    var lar = la.toString();
                    $("#news"+lar).show();
                    $("#page_news > "+".newsInterface"+lar).show();
                    var temp = 511 + (newsnumber*402);
                    var curr = -511 - (402*newsnumber);
                    var foot = 460 + (402*newsnumber);
                    $(".newsModule").animate({height:temp+"px"},500);
                    $(".page-footer").css('top',foot);
                    $("#currentPage").css('margin-top',curr);
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
