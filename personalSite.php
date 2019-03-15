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
       $('#calendar').fullCalendar({
         weekends: true,
         <?php echo returnEvents($_SESSION['u_id'])?>
       });
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
    $link = oneColumnFromTable("siteone_name", $_SESSION['u_id'], "registration", "data_id");

        echo '<form action="fun_exe/LogOut_function.php" method="POST">
          <p class="loggedIn"> Logged in with:';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button></li>
        <a href="'.$link[0].'" target="_blank" style="color:white;">Generierte Seite</a>
      </form> </div>
    </nav>';

    ?>
    <div id="module_container">
      <?php
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
                      <p>Add an event: (Date ex.: 2018-03-27)</p>
                        <input type="text" class="form-control" id="event_title" placeholder="Title" name="event_title">
                        <input type="text" class="form-control" id="event_date" placeholder="Date" name="event_date"><br>
                        <p>add a Module</p>
                        <p>Title:</p>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="calendar_title">
                        <p>Code</p>
                        <textarea name="calendar_code" cols="40" rows="5" class="code"></textarea>
                        <button type="submit" name="newEvent" formmethod="POST" value="'.$name2.'">add a new event</button>
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
        if(WorkersOn($_SESSION['u_id']) == 1){
          $name6 = oneValueFromTableData($_SESSION['u_id'], "workers_file_name");
          $result6 = printFormforWorkers($_SESSION['u_id'], $name6);
          echo '<div class="workersModule" onclick="clickedWorkers()">
                  <p class="text">Übersicht aller Mitarbeiter</p>
                  <div class="w_text">
                    <p>Dieses Modul existiert um alle Mitarbeiter zu bearbeiten Modul</p>
                    <form action="update_site.php" method="POST">
                      <div class="form-group">'.$result6.'
                        <p>füge einen Mitarbeiter hinzu</p>
                        <input type="text" class="form-control" id="worker_adress" placeholder="Anrede" name="workers_adress">
                        <input type="text" class="form-control" id="worker_vorname" placeholder="Vorname" name="workers_firstname">
                        <input type="text" class="form-control" id="worker_nachname" placeholder="Nachname" name="workers_lastname">
                        <input type="text" class="form-control" id="worker_job" placeholder="Job" name="workers_job">
                        <input type="text" class="form-control" id="worker_tel" placeholder="Telefon" name="workers_tel">
                        <input type="file" class="form-control" id="worker_img" name="worker_image" accept="image/*">
                        <p><input type ="radio" name ="workers_type" value="leader"/>Führungsposition</p>
                        <p><input type ="radio" name ="workers_type" value="secr"/>Sekretariat</p>
                        <p><input type ="radio" name ="workers_type" value="teacher"/>Lehrer/innen</p>
                        <p><input type ="radio" name ="workers_type" value="other"/>Andere</p>
                        <button type="submit" name="add_workers_button" formmethod="POST" value="'.$name6.'">Add</button>
                        <button type="submit" name="delete_workers_button" formmethod="POST" value="'.$name6.'">Delete</button>
                        <button class="go_back6" onclick="WorkersBack()" name="backbutton">Go Back</button>
                      </div>
                    </form>
                  </div>
                </div>';
        }
        if(AnfahrtOn($_SESSION['u_id']) == 1){

          $codeAnfahrt = oneValueFromTableData($_SESSION['u_id'], "anfahrt_file_name");
          $codeAnfahrt2 = printFormforAnfahrt($_SESSION['u_id'], $codeAnfahrt);
          echo '<div class="anfahrtModule" onclick="clickedAnfahrt()">
                  <p class="text">Konfiguriere die Anfahrt</p>
                  <div class="a_text">
                    <p>Dieses Modul existiert um die Anfahrt zu bearbeiten</p>
                    <form action="update_site.php" method="POST">
                      <div class="form-group">'.$codeAnfahrt2.'
                        <button type="button" class="save_changes_anfahrt" name="anfahrt_button">Speichere Veränderungen</button>
                        <button class="go_back7" onclick="AnfahrtBack()" name="backbutton">Go Back</button>
                      </div>
                    </form>
                  </div>
                </div>';
        }
        if(ClassesOn($_SESSION['u_id']) == 1){
          echo '<div class="classesModule" onclick="clickedClasses()">
                  <p class="text">Konfiguriere alle Klassen</p>
                  <div class="cl_text">
                    <p>Dieses Modul existiert um alle vorhandenen klassen zu bearbeiten</p>
                    <form action="update_site.php" method="POST">
                      <div class="form-group">
                        <button class="go_back8" onclick="ClassesBack()" name="backbutton">Go Back</button>
                      </div>
                    </form>
                  </div>
                </div>';
        }
        if(SignupOn($_SESSION['u_id']) == 1){
          echo '<div class="signupModule" onclick="clickedSignup()">
                  <p class="text">Konfiguriere das Einschreibungssytem</p>
                  <div class="su_text">
                    <p>Dieses Modul existiert um das Einschreibungssytem zu bearbeiten</p>
                    <form action="update_site.php" method="POST">
                      <div class="form-group">
                        <button class="go_back9" onclick="SignupBack()" name="backbutton">Go Back</button>
                      </div>
                    </form>
                  </div>
                </div>';
        }
        $codeImpressum = printFormforImpressum($_SESSION['u_id']);
        echo '<div class="impressum" onclick="clickedImpressum()">
                <p class="text">Konfiguriere das Impressum </p>
                <div class="i_text">
                  <p>Dieses Modul existiert um das Impressum zu bearbeiten</p>
                  <form action="update_site.php" method="POST">
                    <div class="form-group">'.$codeImpressum.'
                    <button type="button" class="impressum_button" name="impressum_button">Speichere Veränderungen</button>
                      <button class="go_back10" onclick="ImpressumBack()" name="backbutton">Go Back</button>
                    </div>
                  </form>
                </div>
              </div>';
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
          $fileinterface7 = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
          echo printCustomeInInterface($_SESSION['u_id'], $fileinterface7);
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
          echo returnInterfaceHeader($_SESSION['u_id']);
          echo $var[0];
          echo returnInterfaceFooter($_SESSION['u_id']);
        }
        ?>
      </div>
      <div class="page_gallery">
        <?php
        if(GalleryOn($_SESSION['u_id']) == 1){
          $fileinterface2 = oneValueFromTableData($_SESSION['u_id'], "gallery_file_name");
          echo printGalleryInInterface($_SESSION['u_id'], $fileinterface2);
        }
        ?>
      </div>
      <div class="page_workers">
        <?php
        if(WorkersOn($_SESSION['u_id']) == 1){
          $fileinterface3 = oneValueFromTableData($_SESSION['u_id'], "workers_file_name");
          echo printWorkersInInterface($_SESSION['u_id'], $fileinterface3);
        }
        ?>
      </div>
      <div class="page_anfahrt">
        <?php
        if(AnfahrtOn($_SESSION['u_id']) == 1){
          $fileinterface4 = oneValueFromTableData($_SESSION['u_id'], "anfahrt_file_name");
          echo printAnfahrtInInterface($_SESSION['u_id'], $fileinterface4);
        }
        ?>
      </div>
      <div class="page_classes">
        <?php
        if(ClassesOn($_SESSION['u_id']) == 1){

        }
        ?>
      </div>
      <div class="page_signup">
        <?php
        if(SignupOn($_SESSION['u_id']) == 1){

        }
        ?>
      </div>
      <div class="page_impressum">
        <?php
          echo printImpressumInInterface($_SESSION['u_id']);
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
    var workers = 0;
    var anfahrt = 0;
    var classes = 0;
    var signup = 0;
    var impressum = 0;
    var impressumon = 1;
    var leftright = 1;
    var leftrightGallery =1;
    <?php
    if(CustomeOn($_SESSION['u_id']) == 1){
      echo 'var customeon = 1;';
      $customename = oneValueFromTableData($_SESSION['u_id'], "custome_file_name");
      //$calendarname = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
      $numbercustome = numberCostume($_SESSION['u_id'], $customename);
      //$numbercalendar = numberCostume($_SESSION['u_id'], $calendarname);
      //echo 'var calendarnumber ='.$numbercalendar.';';
      echo 'var customenumber ='.$numbercustome.';';
    }else{
      echo 'var customeon = 0;';
    }

    if(CalendarOn($_SESSION['u_id']) == 1){
      $calendarname = oneValueFromTableData($_SESSION['u_id'], "calendar_file");
      $numbercalendar = numberCostume($_SESSION['u_id'], $calendarname);
      echo 'var calendarnumber ='.$numbercalendar.';';
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
      echo 'var loop_number = 0;';
    }

    if(WorkersOn($_SESSION['u_id']) == 1){
      echo 'var workerson = 1;';
    }else{
      echo 'var workerson = 0;';
    }

    if(AnfahrtOn($_SESSION['u_id']) == 1){
      echo 'var anfahrton = 1;';
    }else{
      echo 'var anfahrton = 0;';
    }

    if(ClassesOn($_SESSION['u_id']) == 1){
      echo 'var classeson = 1;';
    }else{
      echo 'var classeson = 0;';
    }

    if(SignupOn($_SESSION['u_id']) == 1){
      echo 'var signupon = 1;';
    }else{
      echo 'var signupon = 0;';
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

    var sumup = customeon+calendaron+newson+galleryon+starton+signupon+classeson+anfahrton+workerson+impressumon;
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
          document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
          if(calendaron == 1){
            document.getElementsByClassName('calendarModule')[0].style.display="none";
          }
          if(newson == 1){
            document.getElementsByClassName('newsModule')[0].style.display="none";
          }
          if(galleryon == 1){
            document.getElementsByClassName('galleryModule')[0].style.display="none";
          }
          if(signupon == 1){
            document.getElementsByClassName('signupModule')[0].style.display="none";
          }
          if(classeson == 1){
            document.getElementsByClassName('classesModule')[0].style.display="none";
          }
          if(anfahrton == 1){
            document.getElementsByClassName('anfahrtModule')[0].style.display="none";
          }
          if(workerson == 1){
            document.getElementsByClassName('workersModule')[0].style.display="none";
          }
          document.getElementsByClassName('startModule')[0].style.display="none";
          document.getElementsByClassName('impressum')[0].style.display="none";
          document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
          document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="block";
          document.getElementById('module_container').getElementsByTagName('div')[3].removeAttribute("onclick");

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
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('c_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[3].setAttribute("onclick", "clickedCustome()");
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        var temp = marginTopCurrentPage;
        document.getElementById('currentPage').style.marginTop=temp+"px";
      }

      function clickedCalendar(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="block";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var cClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          cClick += 4;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[cClick].removeAttribute("onclick");
        var curr = -548 + (-206*calendarnumber);
        document.getElementById('currentPage').style.marginTop=curr+"px";
      }

      function CalendarBack(){
        var cClick = 3;
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          cClick += 4;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('k_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[cClick].setAttribute("onclick", "clickedCalendar()");
        document.getElementById('currentPage').style.marginTop="-420px";
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedNews(){
        newsdesign();
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var nClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          nClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          nClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[nClick].removeAttribute("onclick");
      }

      function NewsBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('page_news').style.display="none";
        var nClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          nClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          nClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('n_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[nClick].setAttribute("onclick", "clickedNews()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedGallery(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var gClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          gClick += 4;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          gClick += 3 + loop_number;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          gClick += 4;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
          gClick += 3;
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
          gClick += 3;
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
          gClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
          gClick += 3;
        }
        if(impressumon == 1){
          gClick += 3;
        }
        if(loop_number == 1){
          document.getElementById('module_container').getElementsByTagName('div')[gClick].removeAttribute("onclick");
        }else{
          document.getElementById('module_container').getElementsByTagName('div')[gClick+loop_number].removeAttribute("onclick");
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').style.marginTop="-660px";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('g_text')[0].style.display="block";
        document.getElementsByClassName('page-footer')[0].style.top="900px";
      }

      function GalleryBack(){
        var gClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          gClick += 4;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          gClick += 3 + loop_number;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          gClick += 4;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
        }
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('g_text')[0].style.display="none";
        if(loop_number == 1){
          document.getElementById('module_container').getElementsByTagName('div')[gClick+loop_number].setAttribute("onclick", "clickedGallery()");
        }else{
          document.getElementById('module_container').getElementsByTagName('div')[gClick+loop_number].setAttribute("onclick", "clickedGallery()");
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementsByClassName('page-footer')[0].style.top="200px";
      }

      function clickedStart(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
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
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
        }
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('s_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[0].removeAttribute("onclick");
        document.getElementById('currentPage').style.marginTop="-720px";
        document.getElementById('currentPage').getElementsByClassName('page-footer')[0].style.marginTop="-199px";
      }

      function StartBack(){
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
        }
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('s_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[0].setAttribute("onclick", "clickedStart()");
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        var temp = marginTopCurrentPage;
        document.getElementById('currentPage').style.marginTop="-420px";
      }

      function clickedWorkers(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var wClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          wClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          wClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          wClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('w_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[wClick].removeAttribute("onclick");
      }

      function WorkersBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        var wClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          wClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          wClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          wClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('w_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[wClick].setAttribute("onclick", "clickedWorkers()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedAnfahrt(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var aClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          aClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          aClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          aClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
          aClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('a_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[aClick].removeAttribute("onclick");
      }

      function AnfahrtBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        var aClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          aClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          aClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          aClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
          aClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('a_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[aClick].setAttribute("onclick", "clickedAnfahrt()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedClasses(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var clClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          clClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          clClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          clClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
          clClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
          clClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('cl_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[clClick].removeAttribute("onclick");
        var curr = -511 - (402*newsnumber);
        var foot = 460 + (402*newsnumber);
        document.getElementById('currentPage').style.marginTop=curr+"px";
        document.getElementsByClassName('page-footer')[0].style.top=foot+"px";
      }

      function ClassesBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        var clClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          clClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          clClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          clClick += 3 + loop_number;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="block";
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
          clClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
          clClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('cl_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[clClick].setAttribute("onclick", "clickedClasses()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedSignup(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var sClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          sClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          sClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          sClick += 3 + loop_number;
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
          sClick += 3;
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
          sClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
          sClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementsByClassName('impressum')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('su_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[sClick].removeAttribute("onclick");
        var curr = -511 - (402*newsnumber);
        var foot = 460 + (402*newsnumber);
        document.getElementById('currentPage').style.marginTop=curr+"px";
        document.getElementsByClassName('page-footer')[0].style.top=foot+"px";
      }

      function SignupBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        var sClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          sClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          sClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          sClick += 3 + loop_number;
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
          sClick += 3;
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
          sClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
          sClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementsByClassName('impressum')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('su_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[sClick].setAttribute("onclick", "clickedSignup()");
        document.getElementById('currentPage').style.marginTop=marginTopCurrentPage+"px";
      }

      function clickedImpressum(){
        document.getElementById('currentPage').getElementsByClassName('page_custome')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_calendar')[0].style.display="none";
        document.getElementById('page_news').style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_gallery')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_workers')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_anfahrt')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_classes')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_signup')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="block";
        var iClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="none";
          iClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="none";
          iClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="none";
          iClick += 3 + loop_number;
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="none";
          iClick += 3;
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="none";
          iClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="none";
          iClick += 3;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
          iClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="none";
        }
        document.getElementsByClassName('startModule')[0].style.display="none";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="none";
        document.getElementById('module_container').getElementsByClassName('i_text')[0].style.display="block";
        document.getElementById('module_container').getElementsByTagName('div')[iClick].removeAttribute("onclick");
      }

      function ImpressumBack(){
        document.getElementsByClassName('page-footer')[0].style.top="200px";
        document.getElementById('currentPage').getElementsByClassName('page_impressum')[0].style.display="none";
        var iClick = 3;
        if(customeon == 1){
          document.getElementsByClassName('costumeModule')[0].style.display="block";
          iClick += 4;
        }
        if(calendaron == 1){
          document.getElementsByClassName('calendarModule')[0].style.display="block";
          iClick += 3;
        }
        if(newson == 1){
          document.getElementsByClassName('newsModule')[0].style.display="block";
          iClick += 3 + loop_number;
        }
        if(classeson == 1){
          document.getElementsByClassName('classesModule')[0].style.display="block";
          iClick += 3;
        }
        if(anfahrton == 1){
          document.getElementsByClassName('anfahrtModule')[0].style.display="block";
          iClick += 3;
        }
        if(workerson == 1){
          document.getElementsByClassName('workersModule')[0].style.display="block";
          iClick += 3;
        }
        if(signupon == 1){
          document.getElementsByClassName('signupModule')[0].style.display="none";
          iClick += 3;
        }
        if(galleryon == 1){
          document.getElementsByClassName('galleryModule')[0].style.display="block";
        }
        document.getElementsByClassName('startModule')[0].style.display="block";
        document.getElementById('currentPage').getElementsByClassName('page_main')[0].style.display="block";
        document.getElementById('module_container').getElementsByClassName('i_text')[0].style.display="none";
        document.getElementById('module_container').getElementsByTagName('div')[iClick].setAttribute("onclick", "clickedImpressum()");
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

            $(".galleryModule").click(function () {

              if(gallery == 0){
                gallery = 1;
                $(".galleryModule").animate({height:"700px"},500);
                $(".galleryModule > .text").hide();
              }
              $(".go_back4").click(function() {
                gallery = 0;
                $(".galleryModule").animate({height:"120px"},500);
                $(".galleryModule > .text").show();
                return false;
              });
            });

            $(".workersModule").click(function () {

              if(workers == 0){
                workers = 1;
                $(".workersModule").animate({height:"700px"},500);
                $(".workersModule > .text").hide();
              }
              $(".go_back6").click(function() {
                workers = 0;
                $(".workersModule").animate({height:"120px"},500);
                $(".workersModule > .text").show();
                return false;
              });
            });

            $(".anfahrtModule").click(function () {

              if(anfahrt == 0){
                anfahrt = 1;
                $(".anfahrtModule").animate({height:"700px"},500);
                $(".anfahrtModule > .text").hide();
              }
              $(".go_back7").click(function() {
                anfahrt = 0;
                $(".anfahrtModule").animate({height:"120px"},500);
                $(".anfahrtModule > .text").show();
                return false;
              });
            });

            $(".classesModule").click(function () {

              if(classes == 0){
                classes = 1;
                $(".classesModule").animate({height:"700px"},500);
                $(".classesModule > .text").hide();
              }
              $(".go_back8").click(function() {
                classes = 0;
                $(".classesModule").animate({height:"120px"},500);
                $(".classesModule > .text").show();
                return false;
              });
            });

            $(".signupModule").click(function () {

              if(signup == 0){
                signup = 1;
                $(".signupModule").animate({height:"700px"},500);
                $(".signupModule > .text").hide();
              }
              $(".go_back9").click(function() {
                signup = 0;
                $(".signupModule").animate({height:"120px"},500);
                $(".signupModule > .text").show();
                return false;
              });
            });

            $(".impressum").click(function () {

              if(impressum == 0){
                impressum = 1;
                $(".impressum").animate({height:"200px"},500);
                $(".impressum > .text").hide();
              }
              $(".go_back10").click(function() {
                impressum = 0;
                $(".impressum").animate({height:"120px"},500);
                $(".impressum > .text").show();
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
                        var slider = $("#school_slider1").val();
                        var slider2 = $("#school_slider2").val();
                        $.ajax({
                          type:"POST",
                          url: "onChangeStart.php",
                          data: {Codeslider:slider, Codeslider2:slider2, file:startPagefile, Codename:name, Codeheader:header, Codedescription:description, Codeplz:plz, Codeort:ort, Codetel:tel, Codestreet:street, Codefax:fax, Codemail:mail, Codelogo:logo},
                          success: function (data) {
                          }
                      });


                  });
                ';
              //show changes directy in the Impressum Modul
              echo '$("#school_impressum").keyup(function (){
                      document.getElementById("currentPage").getElementsByClassName("impressum_text")[0].innerHTML = $(this).val();
                    });
                    $("#anfahrt_text").keyup(function (){
                      document.getElementById("currentPage").getElementsByClassName("anfahrt_text")[0].innerHTML = $(this).val();
                    });
                    $(".impressum_button").click(function (){
                        var impressum_text = $("#school_impressum").val();
                        $.ajax({
                          type:"POST",
                          url: "onChangeImpressum.php",
                          data: {Codeimpressum:impressum_text},
                          success: function (data) {
                          }
                      });
                  });
                  $(".save_changes_anfahrt").click(function (){
                      var anfahrt_text = $("#anfahrt_text").val();
                      $.ajax({
                        type:"POST",
                        url: "onChangeImpressum.php",
                        data: {Codeanfahrt:anfahrt_text},
                        success: function (data) {
                        }
                    });
                });';

              ?>
          });


    </script>
    </html>
