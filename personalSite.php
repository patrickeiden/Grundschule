<?php
session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
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
      <a class="navbar-brand" href="startsite.php">Gruschool</a>
      <a class="navbar-brand" href="interface.php">Personal Site</a>

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
          $result1 = printFormforCustome($name1, false);
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
          $result2 = printFormforCustome($name2, true);
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
        if(GalleryOn($_SESSION['u_id']) == 1){
          $name4 = oneValueFromTableData($_SESSION['u_id'], "gallery_file_name");
          $result4 = printFormForGallery($_SESSION['u_id'], $name4);
          echo '<div class="galleryModule" onclick="clickedGallery()">
          <p class="text"> the gallery module is currently intergrated on your website</p>
          <div class="g_text">
          <form action="update_site.php" method="POST">
            <div class="form-group">'.$result4[sizeof($result4)-1].'
              <p>With this form you are able to add a Gallery</p>
              <input type="text" class="form-control" id="gallery" placeholder="Gallery" name="gallery">
              <button type="submit" name="newImages" formmethod="POST" value="'.$name4.'">add a new Images</button>
              <button type="submit" name="newGallery" formmethod="POST" value="'.$name4.'">add a new Gallery</button>
              <button type="submit" name="delete_galleries_button" formmethod="POST" value="'.$name4.'">Delete Galleries</button>
              <button type="submit" name="delete_images_button" formmethod="POST" value="'.$name4.'">Delete Images</button>
              <button class="go_back4" onclick="GalleryBack()" name="backbutton">Go Back</button>
            </div>
          </form>
          </div>
          </div>';
        }
        if(BuildingOn($_SESSION['u_id']) == 1){
          echo '<div class="buildingModule" onclick="clickedGallery()">
            <p class="text"> the building module is currently intergrated on your website</p>
            <div class="b_text">
            </div>
          </div>';
        }
        $name5 = oneColumnFromTable("siteone_name", $_SESSION['u_id'], "registration", "data_id");
        $Startname = oneColumnFromTable("name", $name5[0], "Page", "page_file_name");
        $Startheader = oneColumnFromTable("header", $name5[0], "Page", "page_file_name");
        $Starttext = oneColumnFromTable("text", $name5[0], "Page", "page_file_name");
        $Startstreet = oneColumnFromTable("street", $name5[0], "Page", "page_file_name");
        $Startplz = oneColumnFromTable("plz", $name5[0], "Page", "page_file_name");
        $Startort = oneColumnFromTable("ort", $name5[0], "Page", "page_file_name");
        $Startnumber = oneColumnFromTable("number", $name5[0], "Page", "page_file_name");
        $Startfax = oneColumnFromTable("fax", $name5[0], "Page", "page_file_name");
        $Startmail = oneColumnFromTable("mail", $name5[0], "Page", "page_file_name");
        $form5 = printFormForStart($name5[0]);

        echo '<div class="startModule" onclick="clickedStart()">
                <p class="text">Konfiguriere die Startseite</p>
                <div class="s_text">
                  <p>This module exists in order to change important settings on the Start site</p>
                  <form action="update_site.php" method="POST">
                    <div class="form-group">
                      <p>Change the Name of your school:</p>
                      <input type="text" class="form-control" id="school_name" placeholder="Name" name="school_name" value="'.$Startname[0] .'">
                      <p>Setzen sie das Logo ihrer Schule:</p>
                      <input type="file" id="school_logo" name="school_logo" accept="image/*">'.$form5.'
                      <p>Fügen sie ein neues Bild zu ihrem Slider hinzu:</p>
                      <input type="file" id="school_slider" name="school_slider" accept="image/*">
                      <p>Change the header of your school:</p>
                      <input type="text" class="form-control" id="school_header" placeholder="Überschrift" name="school_header" value="'.$Startheader[0].'">
                      <p>Change the text of your school:</p>
                      <textarea name="school_description" cols="40" rows="5" id="school_description" required>'.$Starttext[0].'</textarea>
                      <p>Verändere die Adresse im Footer:</p>
                      <input type="text" class="form-control" id="school_street" placeholder="Straße" name="school_street" value="'.$Startstreet[0].'">
                      <input type="text" class="form-control" id="school_plz" placeholder="PLZ" name="school_plz" value="'.$Startplz[0].'">
                      <input type="text" class="form-control" id="school_ort" placeholder="Ort" name="school_ort" value="'.$Startort[0].'">
                      <p>Verändere Kontaktdaten im Footer:</p>
                      <input type="text" class="form-control" id="school_tel" placeholder="Telefon" name="school_tel" value="'.$Startnumber[0].'">
                      <input type="text" class="form-control" id="school_fax" placeholder="Fax" name="school_fax" value="'.$Startfax[0].'">
                      <input type="text" class="form-control" id="school_mail" placeholder="Mail" name="school_mail" value="'.$Startmail[0].'">
                      <button class="go_back5" onclick="StartBack()" name="backbutton">Go Back</button>
                      <button class="startButton" type="button">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>';
      ?>
    </div>

    <div id="currentPage">
      <div class="page_main">
        <?php
        echo returninterfacecode($_SESSION['u_id']);
         ?>
      </div>
      <div class="page_custome">
        <?php
        if(CustomeOn($_SESSION['u_id']) == 1){
          echo printCustomeInInterface($_SESSION['u_id']);
        }
         ?>
      </div>
      <div class="page_calendar">
        <?php
        if(CalendarOn($_SESSION['u_id']) == 1){
          echo printCalendarInInterface($_SESSION['u_id']);
        }
        ?>
      </div>
      <div id="page_news">
        <?php
        if(NewsOn($_SESSION['u_id']) == 1){
          $fileinterface = oneValueFromTableData($_SESSION['u_id'], "news_file_name");
          $var = printNewsInInterface($_SESSION['u_id'], $fileinterface);
          //echo returnInterfaceHeader($_SESSION['u_id']);
          echo $var[0];
          //echo returnInterfaceFooter($_SESSION['u_id']);
        }
        ?>
      </div>
      <div class="page_gallery">
        <?php
          echo returnInterfaceHeader($_SESSION['u_id']);
          echo returnInterfaceFooter($_SESSION['u_id']);
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
    var starton = 1;
    var start = 0;
    var custome = 0;
    var calendar = 0;
    var news = 0;
    var gallery = 0;
    var leftright = 1;
    var leftrightGallery =1;
    <?php
    if(CustomeOn($_SESSION['u_id']) == 1){
      echo 'var customeon = 1;';
      $customename = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
      $calendarname = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
      $numbercustome = numberCostume($_SESSION['u_id'], $customename);
      $numbercalendar = numberCostume($_SESSION['u_id'], $calendarname);
      echo 'var calendarnumber ='.$numbercalendar.';';
      echo 'var customenumber ='.$numbercustome.';';
    }else{
      echo 'var customeon = 0;';
    }

    if(CalendarOn($_SESSION['u_id']) == 1){
      echo 'var calendaron = 1;';
    }else{
      echo 'var calendaron = 0;';
    }

    if(GalleryOn($_SESSION['u_id']) == 1){
      $filenameGallery = oneValueFromTableData($_SESSION['u_id'], "gallery_file_name");
      $resultGallery = printFormForGallery($_SESSION['u_id'], $filenameGallery);
      $numberGalleries = oneColumnFromTable("gallery_name", $filenameGallery, "Galleries", "gallery_file_name");
      for ($i=0; $i < sizeof($numberGalleries); $i++) {
        echo 'var leftright'.($i+1).'= 1;';
      }
      echo 'var numbergalleries = '.sizeof($numberGalleries).';';
      echo $resultGallery[sizeof($resultGallery)-2];
      echo 'var galleryon = 1;';
    }else{
      echo 'var galleryon = 0;';
      $numberGalleries = array();
    }
    //number of entrys in custome module for different files in order to scale the site


    if(NewsOn($_SESSION['u_id']) == 1){
      echo 'var newson = 1;';
      $leftright = 1;
      $jsname = oneValueFromTableData($_SESSION['u_id'], "news_file_name");
      $jsresult = printFormforNews($_SESSION['u_id'], $jsname);
      $jsnumber = numberofNews("title", $jsname, "new_news", "news_file");
      $jstable_data = oneValueFromTableData($_SESSION['u_id'], "news_number");
      $jsinterface = printNewsInInterface($_SESSION['u_id'], $jsname);
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

    if(BuildingOn($_SESSION['u_id']) == 1){
      echo 'var buildingon = 1;';
    }else{
      echo 'var buildingon = 0;';
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

    var sumup = customeon+calendaron+newson+galleryon+starton;
    var marginTopCurrentPage = 0;
    if(sumup>1){
       marginTopCurrentPage = ((-sumup+1)*140)-120;
    }

    document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";

      function clickedCustome(){
          document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="block";
          document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
          document.getElementById('page_news').style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
          if(calendaron == 1){
            document.getElementsByClassName('calendarModule')[0].style.display="none";
          }
          if(newson == 1){
            document.getElementsByClassName('newsModule')[0].style.display="none";
          }
          if(galleryon == 1){
            document.getElementsByClassName('galleryModule')[0].style.display="none";
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
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
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
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
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
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
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
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
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
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[7].setAttribute("onclick", "clickedNews()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedGallery(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="block";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
        }
        if(loop_number == 1){
          document.getElementById('module_container').getElementsByTagName('div')[11].removeAttribute("onclick");
        }else{
          document.getElementById('module_container').getElementsByTagName('div')[10+loop_number].removeAttribute("onclick");
        }
        document.getElementById('currentPage').style.marginTop="-120px";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('g_text')[0].style.display="block";
        document.getElementsByClassName('page-footer')[0].style.top="900px";
      }

      function GalleryBack(){
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('g_text')[0].style.display="none";
        if(loop_number == 1){
          document.getElementById('module_container').getElementsByTagName('div')[11].setAttribute("onclick", "clickedGallery()");
        }else{
          document.getElementById('module_container').getElementsByTagName('div')[10+loop_number].setAttribute("onclick", "clickedGallery()");
        }
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementsByClassName('page-footer')[0].style.top="200px";
      }

      function clickedStart(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('s_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[12].removeAttribute("onclick");
        document.getElementById('currentPage').style.marginTop="-720px";
        document.getElementById('currentPage').getElementsByClassName('page-footer')[0].style.marginTop="-199px";

      }

      function StartBack(){
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementById('module_container').getElementsByClassName('s_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[12].setAttribute("onclick", "clickedStart()");
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        var temp = marginTopCurrentPage;
        document.getElementById('currentPage').style.marginTop="-420px";
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

            $(".galleryModule").click(function () {

              if(gallery == 0){
                gallery = 1;
                $(".galleryModule").animate({height:"700px"},500);
                $(".galleryModule > .text").hide();
              }
              $(".go_back4").click(function() {
                news = 0;
                $(".galleryModule").animate({height:"120px"},500);
                $(".galleryModule > .text").show();
                return false;
              });
            });

            $(".startModule").click(function () {

              if(start == 0){
                start = 1;
                $(".startModule").animate({height:"700px"},500);
                $(".startModule > .text").hide();
              }
              $(".go_back5").click(function() {
                start = 0;
                $(".startModule").animate({height:"120px"},500);
                $(".startModule > .text").show();
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

            //left and right for the Gallery Module (Images)
            if(galleryon == 1){
              <?php
              $temp = 1;
              $temp2 = 1;
              for ($p=0; $p < sizeof($numberGalleries); $p++) {

                echo '$("#gallery'.$temp2.' > .right'.($p+1).'").click(function () {
                  if(leftright'.$temp2.' < '.ceil($resultGallery[$temp2-1]/3).'){
                    leftright'.$temp2.'++;
                    for (var j = 0; j < '.ceil($resultGallery[$temp2-1]/3).'; j++) {
                      if(j+1 == leftright'.$temp2.'){
                        var la = j+1;
                        var lar = la.toString();
                        $("#gallery'.$temp2.' > .images'.$temp2.'_"+lar).show();
                      }else{
                        var la = j+1;
                        var lar = la.toString();
                        $("#gallery'.$temp2.' > .images'.$temp2.'_"+lar).hide();
                      }
                    }
                  }
                });';
                $temp2++;
              }

              for ($p=0; $p < sizeof($numberGalleries); $p++) {
                echo '$("#gallery'.$temp.' > .left'.($p+1).'").click(function () {
                  if(leftright'.$temp.' > 1){
                    leftright'.$temp.'--;
                    for (var j = 0; j < '.ceil($resultGallery[$temp-1]/3).'; j++) {
                      if(j+1 == leftright'.$temp.'){
                        var la = j+1;
                        var lar = la.toString();
                        $("#gallery'.$temp.' > .images'.$temp.'_"+lar).show();
                      }else{
                        var la = j+1;
                        var lar = la.toString();
                        $("#gallery'.$temp.' > .images'.$temp.'_"+lar).hide();
                      }
                    }
                  }
                });';
                $temp++;
              }
              ?>
              //left and right for the Gallery Module (Galleries)
              $(".left_gallery").click(function () {
                if(leftrightGallery > 1){
                  leftrightGallery--;
                  if(numbergalleries > 2){
                    for (var i = 0; i < Math.ceil(numbergalleries/3); i++) {
                      if(i+1 == leftrightGallery){
                        var la = i+1;
                        var lar = la.toString();
                        $("#galleries"+lar).show();
                      }else{
                        var la = i+1;
                        var lar = la.toString();
                        $("#galleries"+lar).hide();
                      }
                    }
                  }
                }
              });

              $(".right_gallery").click(function () {
                if(leftrightGallery < Math.ceil(numbergalleries/3)){
                  leftrightGallery++;
                  if(numbergalleries > 2){
                    for (var i = 0; i < Math.ceil(numbergalleries/3); i++) {
                      if(i+1 == leftrightGallery){
                        var la = i+1;
                        var lar = la.toString();
                        $("#galleries"+lar).show();
                      }else{
                        var la = i+1;
                        var lar = la.toString();
                        $("#galleries"+lar).hide();
                      }
                    }
                  }
                }
              });
            }
              //show directly changes on the site for custome module
              <?php
              if(CustomeOn($_SESSION['u_id'])){
                $numberCustome = oneColumnFromTable("custome_name", $name1, "Module", "custome_file");
                $num_rowsCustome = sizeof($numberCustome);
                echo 'var customeRows ='.$num_rowsCustome.';';
                for ($i=0; $i < $num_rowsCustome; $i++) {
                  echo 'var numberLoop'.($i+1).' ='.($i+1).';';
                  $name = 'customeName_'.($i+1);
                  $_SESSION[$name]= $numberCustome[$i];
                  echo '
                    $("#code'.($i+1).'").keyup(function (){
                      document.getElementById("currentPage").getElementsByClassName("custome_'.$numberCustome[$i].'")[0].innerHTML = $(this).val();
                    });
                    $("#code'.($i+1).'").change(function() {
                        var text = $("#code'.($i+1).'").val();
                        $.ajax({
                          type:"POST",
                          url: "onChange.php",
                          data: {ajaxCode:text, number:numberLoop'.($i+1).'},
                          success: function (data) {
                          }
                      });

                      var http = new XMLHttpRequest();
                      var url = "onChange.php";
                      http.open("POST", "onChange.php", true);

                      //Send the proper header information along with the request
                      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                      http.onreadystatechange = function() {//Call a function when the state changes.
                          if(http.readyState == 4 && http.status == 200) {
                              document.getElementById("currentPage").getElementsByClassName("custome_'.$numberCustome[$i].'")[0].innerHTML=this.responseText;
                          }
                      }
                      http.send();
                    });
                  ';
                  }
                }

                //show directly changes on the site for Calendar module
                if(CalendarOn($_SESSION['u_id'])){
                $numberCalendar = oneColumnFromTable("custome_name", $name2, "Module", "custome_file");
                $num_rowsCustome = sizeof($numberCalendar);
                echo 'var calendarRows ='.$num_rowsCustome.';';
                for ($i=0; $i < $num_rowsCustome; $i++) {
                  echo 'var numberLoopCalendar'.($i+1).' ='.($i+1).';';
                  $name = 'calendarName_'.($i+1);
                  $_SESSION[$name]= $numberCalendar[$i];
                  echo '
                    $("#calendarCode'.($i+1).'").keyup(function (){
                      document.getElementById("currentPage").getElementsByClassName("calendar_'.$numberCalendar[$i].'")[0].innerHTML = $(this).val();
                    });
                    $("#calendarCode'.($i+1).'").change(function() {
                        var text = $("#calendarCode'.($i+1).'").val();
                        $.ajax({
                          type:"POST",
                          url: "onChangeCustome.php",
                          data: {ajaxCode:text, number:numberLoopCalendar'.($i+1).'},
                          success: function (data) {
                          }
                      });

                      var http = new XMLHttpRequest();
                      var url = "onChange.php";
                      http.open("POST", "onChangeCustome.php", true);

                      //Send the proper header information along with the request
                      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                      http.onreadystatechange = function() {//Call a function when the state changes.
                          if(http.readyState == 4 && http.status == 200) {
                              document.getElementById("currentPage").getElementsByClassName("calendar_'.$numberCalendar[$i].'")[0].innerHTML=this.responseText;
                          }
                      }
                      http.send();
                    });
                  ';
                  }
                }

                //show directly changes for the start Module
              $file5 = oneColumnFromTable("siteone_name", $_SESSION['u_id'], "registration", "reg_id");
              echo 'var startPagefile ="'.($file5[0]).'";';
              echo  '$("#school_street").keyup(function (){
                      document.getElementById("currentPage").getElementsByClassName("street")[0].innerHTML = $(this).val();
                    });
                    $("#school_name").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("name")[0].innerHTML = $(this).val();
                    });
                    $("#school_header").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("header")[0].innerHTML = $(this).val();
                    });
                    $("#school_description").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("description")[0].innerHTML = $(this).val();
                    });
                    $("#school_plz").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("plz")[0].innerHTML = $(this).val();
                    });
                    $("#school_ort").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("ort")[0].innerHTML = $(this).val();
                    });
                    $("#school_tel").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("tel")[0].innerHTML = $(this).val();
                    });
                    $("#school_fax").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("fax")[0].innerHTML = $(this).val();
                    });
                    $("#school_mail").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("mail")[0].innerHTML = $(this).val();
                    });
                    $("#school_logo").keyup(function (){
                            document.getElementById("currentPage").getElementsByClassName("logo")[0].innerHTML = $(this).val();
                    });
                    $(".startButton").click(function (){
                        var name = $("#school_name").val();
                        var header = $("#school_header").val();
                        var description = $("#school_description").val();
                        var plz = $("#school_plz").val();
                        var ort = $("#school_ort").val();
                        var tel = $("#school_tel").val();
                        var street = $("#school_street").val();
                        var fax = $("#school_fax").val();
                        var mail = $("#school_mail").val();
                        var logo = $("#school_logo").val();
                        var slider = $("#school_slider").val();
                        $.ajax({
                          type:"POST",
                          url: "onChangeStart.php",
                          data: {Codeslider:slider, file:startPagefile, Codename:name, Codeheader:header, Codedescription:description, Codeplz:plz, Codeort:ort, Codetel:tel, Codestreet:street, Codefax:fax, Codemail:mail, Codelogo:logo},
                          success: function (data) {
                          }
                      });


                  });
                ';
              ?>
          });


    </script>
    </html>
