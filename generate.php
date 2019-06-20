<?php

session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
<?php
  if(isset($_SESSION['u_id'])){
    echo '
    <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
  }else{
    echo '<link rel="stylesheet" type="text/css" href="Css_Files/index.css">
    <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
  }

  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Css_Files/design.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/index.css">

<style>
/*  .page-footer{
    top: 307px;
    width: 100%;
  }*/
  body {
    background-color: #BAB2B5;
  }

  h3 {
    color: white;
  }
  .bottom {
    margin-bottom: 100px;
  }
/*
  .btn:hover {
   padding-top: 15px;
   padding-left: 20px;
   padding-right: 20px;
 }*/

  footer {
      position: absolute;
      bottom: 0px;
      left: 47%;
      color: white;
  }
  .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 85%;
      margin-top: 10px;
    }
    hr {
      background-color: white;
    }
    .Title {
      font-size: 32px;
      font-weight: bold;
      color: white;
      margin-top: 30px;
      position: relative;
      right: 16%;
    }
    .text-right{
      color: white;
    }
    .navbar {
      margin-top: 8px;
      margin-bottom: 20px;
    }
    #main-container a {
      font-size: 13px;
    }
</style>
</head>
<body>
<div class="container">
  <div class="row bottom">
    <div class="col-sm-12">
      <nav class="navbar">
        <h2 class="Title">PAL School</h2>
        <?php
          if(isset($_SESSION['u_id'])){
            echo '
                  <ul class="navbar_list">
                    <li><a href="startsite.php" style="text-decoration: none">Startseite </a></li>
                    <li><a href="ueberuns.php" style="text-decoration: none">Über uns</a></li>
                    <li><a href="interface.php" style="text-decoration: none">Interface</a></li>
                  </ul>
                  </nav>
                  <hr>
                  <form action="fun_exe/LogOut_function.php" method="POST">
                          <p class="loggedIn text-right">Eingeloggt als: ';
                  echo $_SESSION['u_mail'];
                  // echo "<br>";
                  echo    '<button type="submit" name="logout" formmethod="POST" class="logout text-right">Ausloggen</button>

                  </form>';
        }else{
        echo '
                <ul class="navbar_list">
                  <li><a href="startsite.php" style="text-decoration: none">Startseite </a></li>
                  <li><a href="create_account.php" style="text-decoration: none">Registrieren</a></li>
                  <li><a  href="anmeldung.php" style="text-decoration: none">Anmelden</a></li>
                  <li><a href="ueberuns.php" style="text-decoration: none">Über uns</a></li>
                </ul>
              </nav>';
        }
        ?>
    </div>
  </div>
<!-- </div>
 -->
 <div class="row row_modules">
  <div class="col-sm-6">
    <?php
    //Step 1-3. this container contains all modules available on the site
    if(isset($_SESSION['u_id'])){

      $check = oneValueFromTableData($_SESSION['u_id'], "generiert");

      if($check == 0){

      echo  '

        <div id="main-container">
        <div class="moduleStart boxdesign">
          <a onclick="Startmodul()" role="button">Startseitenmodul</a>
        </div>
          <div class="module1 boxdesign">
            <a onclick="module1()" role="button">Custom-Modul</a>
          </div>
          <div class="module2 boxdesign">
            <a onclick="module2()" role="button">Kalendermodul</a>
          </div>
          <div class="module3 boxdesign">
            <a onclick="module3()" role="button">Newsmodul</a>
          </div>
          <div class="module4 boxdesign">
            <a onclick="module4()" role="button">Galeriemodul</a>
          </div>
          <div class="module5 boxdesign">
            <a onclick="module5()" role="button">Jobmodul</a>
          </div>
          <div class="module6 boxdesign">
            <a onclick="module6()" role="button">Anfahrtsmodul</a>
          </div>
          <div class="module7 boxdesign">
            <a onclick="module7()" role="button">Mitarbeitermodul</a>
          </div>
          <div class="module8 boxdesign">
            <a onclick="module8()" role="button">Klassenmodul</a>
          </div>
          <div class="module9 boxdesign">
            <a onclick="module9()" role="button">Einschreibungsmodul</a>
          </div>
          <div class="module10 boxdesign">
            <a onclick="module10()" role="button">Impressumsmodul</a>
          </div>
        </div>
      </div>
      <div class ="col-sm-6">
        <form action="generate_html.php" method="POST" autocomplete="off">
        <div id="start-module">
            <div class="form-group">
              <h5>Füge Ihrer Website ein Startseitenmodul hinzu.</h5>
              <p>Name der Schule:</p>
              <input type="text" class="form-control" id="nameSchool" placeholder="Name der Schule" name="nameSchool" >
              <p>Logo der Schule auswählen:</p>
              <input type="file" name="logo" accept="image/*">
              <p>Erstes Bild für Slider wählen:</p>
              <input type="file" id="school_slider2" name="school_slider2" accept="image/*">
              <p>Überschrift des Textes:</p>
              <input type="text" class="form-control" id="header" placeholder="Überschrift" name="header">
              <p>Kurzbeschreibung:</p>
              <textarea name="desciption" cols="40" rows="5" class="desciption"></textarea>
            </div>
        </div>
        <div id="costume-module">
            <div class="form-group">
              <h5>Füge Ihrer Website einen Titel hinzu.</h5>
              <p>Title:</p>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title"></br>
                <input type ="checkbox" name ="costume_button" value="1"/>
                <p id="costume_button" class="events">Diese Box auswählen, um Startseitenmodul abzuschließen</p>
            </div>
        </div>

         <div id="calendar_module">
          <h5>Kalendermodul</h5>
          <p>Fügt Ihrer Homepage einen Kalender hinzu, in den Ereignisse und wichtige Daten eingetragen werden können.</p>
          <div class="form-group">
          <input type="checkbox" name="calendar" value="1"/>
          <p class="events">Diese Box auswählen, um Kalendermodul zu integrieren.</p>
          </div>
        </div>

        <div id="conf-module3">
          <h5>Wählen Sie die Einstellungen für das Newsmodul.</h5>
          <p>Wählen Sie, wieviele News pro Seite angezeigt werden sollen (3 bis 5)</p>
          <div class="form-group">
          <p class="events_h">Anzahl der news:</p>
          <input type ="radio" name ="news_number" value="3"/>
          <p class="events">3</p>
          <input type ="radio" name ="news_number" value="4"/>
          <p class="events">4</p>
          <input type ="radio" name ="news_number" value="5"/>
          <p class="events">5</p>
          </div>
          <input type ="checkbox" name ="news_button" value="1"/>
          <p class="events">Diese Box auswählen, um Newsmodul zu integrieren.</p>
        </div>

        <div id="conf-module4">
          <h5>Fügt Ihrer Homepage eine Galerie hinzu, in der Bilder präsentiert werden können.</h5>
             <p>Sie können verschiedene Galerien anlegen. </p>
          <input type ="checkbox" name ="gallery_button" value="1"/>
          <p class="events">Diese Box auswählen, um Galeriemodul zu integrieren.</p>
        </div>

        <div id="conf-module6">
        <div class="form-group">
        <h5> Fügt Ihrer Wesbite ein Anfahrtsmodul hinzu.</h5>
          <p>Beschreibung Anfahrt:</p>
          <textarea name="desciption_anfahrt" cols="40" rows="5" class="desciption_anfahrt"></textarea>
          <p>Beschreibung Gebäude:</p>
          <textarea name="desciption_building" cols="40" rows="5" class="desciption_building"></textarea>
          <p>Adresse:</p>
          <input type="text" class="form-control" id="street_school" placeholder="Straße" name="street_school" >
          <input type="text" class="form-control" id="number_school" placeholder="Nummer" name="number_school" >
          <input type="text" class="form-control" id="plz_school" placeholder="PLZ" name="plz_school" >
          <input type="text" class="form-control" id="ort_school" placeholder="Ort" name="ort_school" >
        </div>
          <input type="checkbox" name="anfahrt_button" value="1" />
          <p class="events">Diese Box auswählen, um Anfahrtsmodul zu integrieren.</p>
        </div>

        <div id="conf-module7">
          <h5>Fügt Ihrer Homepage eine Auflistung der Mitarbeiter hinzu, die Sie eintragen.</h5>
          <input type="checkbox" name="worker_button" value="1" />
          <p class="events">Diese Box auswählen, um Mitarbeitermodul zu integrieren.</p>
        </div>

        <div id="conf-module8">
          <h5>Fügt Ihrer Homepage eine Auflistung aller Klassen hinzu, die Sie eintragen.</h5>
          <input type="checkbox" name="classes_button" value="1" />
          <p class="events">Diese Box auswählen, um Klassenmodul zu integrieren.</p>
        </div>

        <div id="conf-module9">
          <h5>Fügt Ihrer Homepage ein Einschreibungssytem hinzu.</h5>
          <p>Beschreibung der Einschreibung:</p>
          <textarea name="desciption_signup" cols="40" rows="5" class="desciption_signup"></textarea><br>
          <p>Stelle eine Datei zum Download bereit:</p>
          <input type="file" name="pdf" accept="image/*">
          <input type="checkbox" name="signup_button" value="1" />
          <p class="events">Diese Box auswählen, um Einschreibungsmodul zu integrieren.</p>
        </div>

        <div id="conf-module10">
          <h5>Ihre Homepage enthält ein Impressum.</h5>
          <textarea name="impressum" cols="40" rows="5" class="impressum" ></textarea><br><br>
        </div>

        <div id="generate_button">
         <button type="submit" name="test" formmethod="POST">Generate</button>
        </div>
        </form>';
      } else if($check == 1) {
        echo  '

        <div id="main-container">
        <div class="moduleStart boxdesign">
          <a onclick="Startmodul()" role="button">Startseitenmodul</a>
        </div>
          <div class="module1 boxdesign">
            <a onclick="module1()" role="button">Custom-Modul</a>
          </div>
          <div class="module2 boxdesign">
            <a onclick="module2()" role="button">Kalendermodul</a>
          </div>
          <div class="module3 boxdesign">
            <a onclick="module3()" role="button">Newsmodul</a>
          </div>
          <div class="module4 boxdesign">
            <a onclick="module4()" role="button">Galeriemodul</a>
          </div>
          <div class="module5 boxdesign">
            <a onclick="module5()" role="button">Jobmodul</a>
          </div>
          <div class="module6 boxdesign">
            <a onclick="module6()" role="button">Anfahrtsmodul</a>
          </div>
          <div class="module7 boxdesign">
            <a onclick="module7()" role="button">Mitarbeitermodul</a>
          </div>
          <div class="module8 boxdesign">
            <a onclick="module8()" role="button">Klassenmodul</a>
          </div>
          <div class="module9 boxdesign">
            <a onclick="module9()" role="button">Einschreibungsmodul</a>
          </div>
          <div class="module10 boxdesign">
            <a onclick="module10()" role="button">Impressumsmodul</a>
          </div>
        </div>
      </div>
      <div class ="col-sm-6">
        <form action="generate_html.php" method="POST" autocomplete="off">
        <div id="start-module">
            <div class="form-group">
              <h5>Füge Ihrer Website ein Startseitenmodul hinzu.</h5>
              <p>Name der Schule:</p>
              <input type="text" class="form-control" id="nameSchool" placeholder="Name der Schule" name="nameSchool" >
              <p>Logo der Schule auswählen:</p>
              <input type="file" name="logo" accept="image/*">
              <p>Erstes Bild für Slider wählen:</p>
              <input type="file" id="school_slider2" name="school_slider2" accept="image/*">
              <p>Überschrift des Textes:</p>
              <input type="text" class="form-control" id="header" placeholder="Überschrift" name="header">
              <p>Kurzbeschreibung:</p>
              <textarea name="desciption" cols="40" rows="5" class="desciption"></textarea>
            </div>
        </div>';

        if(CustomeOn($_SESSION['u_id']) == 0){
          echo '<div id="costume-module">
                    <div class="form-group">
                      <h5>Füge Ihrer Website einen Titel hinzu.</h5>
                      <p>Title:</p>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title"></br>
                        <input type ="checkbox" name ="costume_button" value="1"/>
                        <p id="costume_button" class="events">Diese Box auswählen, um Startseitenmodul abzuschließen</p>
                    </div>
                </div>';
        } else if (CustomeOn($_SESSION['u_id']) == 1){
          echo '<div id="costume-module">
                  <div class="form-group">
                    <h5>Füge Ihrer Website einen Titel hinzu.</h5>
                      <input type ="checkbox" name ="costume_button" value="1"/>
                      <p id="costume_button" class="events">Diese Box auswählen, um Startseitenmodul zu entfernen.</p>
                  </div>
                </div>';
        }

        if(CalendarOn($_SESSION['u_id']) == 0){
          echo '<div id="calendar_module">
                  <h5>Kalendermodul</h5>
                  <p>Fügt Ihrer Homepage einen Kalender hinzu, in den Ereignisse und wichtige Daten eingetragen werden können.</p>
                  <div class="form-group">
                  <input type="checkbox" name="calendar" value="1"/>
                  <p class="events">Diese Box auswählen, um Kalendermodul zu integrieren.</p>
                  </div>
                </div>';
        }else if(CalendarOn($_SESSION['u_id']) == 1){
          echo '<div id="calendar_module">
                  <h5>Kalendermodul</h5>
                  <p>Fügt Ihrer Homepage einen Kalender hinzu, in den Ereignisse und wichtige Daten eingetragen werden können.</p>
                  <div class="form-group">
                  <input type="checkbox" name="calendar" value="1"/>
                  <p class="events">Diese Box auswählen, um Kalendermodul zu entfernen.</p>
                  </div>
                </div>';
        } 

        if(NewsOn($_SESSION['u_id']) == 0){
          echo '<div id="conf-module3">
                  <h5>Wählen Sie die Einstellungen für das Newsmodul.</h5>
                  <p>Wählen Sie, wieviele News pro Seite angezeigt werden sollen (3 bis 5)</p>
                  <div class="form-group">
                  <p class="events_h">Anzahl der news:</p>
                  <input type ="radio" name ="news_number" value="3"/>
                  <p class="events">3</p>
                  <input type ="radio" name ="news_number" value="4"/>
                  <p class="events">4</p>
                  <input type ="radio" name ="news_number" value="5"/>
                  <p class="events">5</p>
                  </div>
                  <input type ="checkbox" name ="news_button" value="1"/>
                  <p class="events">Diese Box auswählen, um Newsmodul zu integrieren.</p>
                </div>';
        } else if(NewsOn($_SESSION['u_id']) == 1){
            echo '<div id="conf-module3">
                    <h5>Wählen Sie die Einstellungen für das Newsmodul.</h5>
                    <div class="form-group">
                    <input type ="checkbox" name ="news_button" value="1"/>
                    <p class="events">Diese Box auswählen, um Newsmodul zu entfernen.</p>
                    </div>
                  </div>';
        }

        if(GalleryOn($_SESSION['u_id']) == 0){
        echo '<div id="conf-module4">
                <h5>Fügt Ihrer Homepage eine Galerie hinzu, in der Bilder präsentiert werden können.</h5>
                   <p>Sie können verschiedene Galerien anlegen. </p>
                <input type ="checkbox" name ="gallery_button" value="1"/>
                <p class="events">Diese Box auswählen, um Galeriemodul zu integrieren.</p>
              </div>';
        }else if(GalleryOn($_SESSION['u_id']) == 1){
          echo '<div id="conf-module4">
                  <h5>Fügt Ihrer Homepage eine Galerie hinzu, in der Bilder präsentiert werden können.</h5>
                     <p>Sie können verschiedene Galerien anlegen. </p>
                  <input type ="checkbox" name ="gallery_button" value="1"/>
                  <p class="events">Diese Box auswählen, um Galeriemodul zu entfernen.</p>
                </div>';
        }

        // echo '<div id="conf-module5">
        //         <h5>Fügt Ihrer Website einen Bereich für offene Stellen und Bewerbungen hinzu.</h5>
        //         <input type="checkbox" name="jobs_form" value="Form" />
        //         <p>Integriertes Bewerbungsformular</p>
        //         <p>Wählen Sie, wieviele Stellenangebote pro Seite angezeigt werden sollen (3 bis 5)</p>
        //         <div class="form-group">
        //         <p class="events_h">Anzahl der Anzeigen:</p>
        //         <input type ="radio" name ="job_number" value="3"/>
        //         <p class="events">3</p>
        //         <input type ="radio" name ="job_number" value="4"/>
        //         <p class="events">4</p>
        //         <input type ="radio" name ="job_number" value="5"/>
        //         <p class="events">5</p>
        //         </div>
        //         <input type="checkbox" name="job_button" value="1" />
        //         <p class="events">Diese Box auswählen, um Jobmodul zu integrieren.</p>
        //       </div>';


        if(AnfahrtOn($_SESSION['u_id']) == 0){
        echo '<div id="conf-module6">
                <div class="form-group">
                <h5> Fügt Ihrer Wesbite ein Anfahrtsmodul hinzu.</h5>
                  <p>Beschreibung Anfahrt:</p>
                  <textarea name="desciption_anfahrt" cols="40" rows="5" class="desciption_anfahrt"></textarea>
                  <p>Beschreibung Gebäude:</p>
                  <textarea name="desciption_building" cols="40" rows="5" class="desciption_building"></textarea>
                  <p>Adresse:</p>
                  <input type="text" class="form-control" id="street_school" placeholder="Straße" name="street_school" >
                  <input type="text" class="form-control" id="number_school" placeholder="Nummer" name="number_school" >
                  <input type="text" class="form-control" id="plz_school" placeholder="PLZ" name="plz_school" >
                  <input type="text" class="form-control" id="ort_school" placeholder="Ort" name="ort_school" >
                </div>
                  <input type="checkbox" name="anfahrt_button" value="1" />
                  <p class="events">Diese Box auswählen, um Anfahrtsmodul zu integrieren.</p>
              </div>';
        }else if(AnfahrtOn($_SESSION['u_id']) == 1){
          echo '<div id="conf-module6" class="entf">
                  <h5> Fügt Ihrer Wesbite ein Anfahrtsmodul hinzu.</h5>
                    <input type="checkbox" name="anfahrt_button" value="1" />
                    <p class="events">Diese Box auswählen, um Anfahrtsmodul zu entfernen.</p>
                </div>';
        }

        if(WorkersOn($_SESSION['u_id']) == 0){
         echo '<div id="conf-module7">
                <h5>Fügt Ihrer Homepage eine Auflistung der Mitarbeiter hinzu, die Sie eintragen.</h5>
                <input type="checkbox" name="worker_button" value="1" />
                <p class="events">Diese Box auswählen, um Mitarbeitermodul zu integrieren.</p>
              </div>';
        }else if(WorkersOn($_SESSION['u_id']) == 1){
          echo '<div id="conf-module7">
                <h5>Fügt Ihrer Homepage eine Auflistung der Mitarbeiter hinzu, die Sie eintragen.</h5>
                <input type="checkbox" name="worker_button" value="1" />
                <p class="events">Diese Box auswählen, um Mitarbeitermodul zu entfernen.</p>
              </div>';
        }

        if(ClassesOn($_SESSION['u_id']) == 0){
         echo '<div id="conf-module8">
                <h5>Fügt Ihrer Homepage eine Auflistung aller Klassen hinzu, die Sie eintragen.</h5>
                <input type="checkbox" name="classes_button" value="1" />
                <p class="events">Diese Box auswählen, um Klassenmodul zu integrieren.</p>
              </div>';
        }else if(ClassesOn($_SESSION['u_id']) == 1){
          echo '<div id="conf-module8">
                <h5>Fügt Ihrer Homepage eine Auflistung aller Klassen hinzu, die Sie eintragen.</h5>
                <input type="checkbox" name="classes_button" value="1" />
                <p class="events">Diese Box auswählen, um Klassenmodul zu entfernen.</p>
              </div>';
        }

        if(SignupOn($_SESSION['u_id']) == 0){
          echo '<div id="conf-module9">
                  <h5>Fügt Ihrer Homepage ein Einschreibungssytem hinzu.</h5>
                  <p>Beschreibung der Einschreibung:</p>
                  <textarea name="desciption_signup" cols="40" rows="5" class="desciption_signup"></textarea><br>
                  <p>Stelle eine Datei zum Download bereit:</p>
                  <input type="file" name="pdf" accept="image/*">
                  <input type="checkbox" name="signup_button" value="1" />
                  <p class="events">Diese Box auswählen, um Einschreibungsmodul zu integrieren.</p>
                </div>';
        }else if(SignupOn($_SESSION['u_id']) == 1){
          echo '<div id="conf-module9">
                  <h5>Fügt Ihrer Homepage ein Einschreibungssytem hinzu.</h5>
                  <input type="checkbox" name="signup_button" value="1" />
                  <p class="events">Diese Box auswählen, um Einschreibungsmodul zu entfernen.</p>
                </div>';
        }

        echo '<div id="conf-module10">
          <h5>Ihre Homepage enthält ein Impressum.</h5>
          <textarea name="impressum" cols="40" rows="5" class="impressum" ></textarea><br><br>
        </div>

        <div id="generate_button">
         <button type="submit" name="test" formmethod="POST">Generate</button>
        </div>
        </form>';
      }
    } else{
      echo  'Bitte loggen Sie sich zuerst ein.';
    }

    ?>
</div>
</div>
<div class="row distance">
  <div class="col-sm-12">
    <footer class="text-center">

  <div class="footer">© 2019 Copyright</div>

</footer>
  </div>
</div>

</div>

</body>
<script>

var distance = 0;
function Startmodul(){
  if(document.getElementById('start-module').style.display!="block"){
     document.getElementById('start-module').style.display="block";
     distance = distance - 400;
     //document.getElementsByTagName("form")[1].getElementsByTagName("div")[0].style.marginTop=distance+"px";
     //document.getElementById("start-module").style.top="-1000px";
  }else{
    document.getElementById('start-module').style.display="none";
    distance = distance + 400;
   // document.getElementsByTagName("form")[1].getElementsByTagName("div")[0].style.marginTop=distance+"px";
    //document.getElementById("start-module").style.top="1000px";
  }
}

function module1(){
  if(document.getElementById('costume-module').style.display!="block"){
     document.getElementById('costume-module').style.display="block";
     distance = distance - 231;
    // document.getElementsByTagName("form")[1].getElementsByTagName("div")[2].style.marginTop=distance+"px";
     temp = -931 + distance;
    // document.getElementById("costume-module").style.top=temp+"px";
  }else{
    document.getElementById('costume-module').style.display="none";
    distance = distance + 231;
    // document.getElementsByTagName("form")[1].getElementsByTagName("div")[2].style.marginTop=distance+"px";
    // document.getElementById("costume-module").style.top="-940px";
  }
}

function module2(){
  if(document.getElementById('calendar_module').style.display!="block"){
     document.getElementById('calendar_module').style.display="block";
  }else{
    document.getElementById('calendar_module').style.display="none";
  }
}

function module3(){
  if(document.getElementById('conf-module3').style.display!="block"){
     document.getElementById('conf-module3').style.display="block";
  }else{
    document.getElementById('conf-module3').style.display="none";
  }
}

function module4() {
  if(document.getElementById('conf-module4').style.display!="block") {
    document.getElementById('conf-module4').style.display="block";
  } else {
    document.getElementById('conf-module4').style.display="none";
  }
}

function module5() {
  if(document.getElementById('conf-module5').style.display!="block") {
    document.getElementById('conf-module5').style.display="block";
  } else {
    document.getElementById('conf-module5').style.display="none";
  }
}

function module6() {
  if(document.getElementById('conf-module6').style.display!="block") {
    document.getElementById('conf-module6').style.display="block";
  } else {
    document.getElementById('conf-module6').style.display="none";
  }
}

function module7() {
  if(document.getElementById('conf-module7').style.display!="block") {
    document.getElementById('conf-module7').style.display="block";
  } else {
    document.getElementById('conf-module7').style.display="none";
  }
}

function module8() {
  if(document.getElementById('conf-module8').style.display!="block") {
    document.getElementById('conf-module8').style.display="block";
  } else {
    document.getElementById('conf-module8').style.display="none";
  }
}

function module9() {
  if(document.getElementById('conf-module9').style.display!="block") {
    document.getElementById('conf-module9').style.display="block";
  } else {
    document.getElementById('conf-module9').style.display="none";
  }
}

function module10() {
  if(document.getElementById('conf-module10').style.display!="block") {
    document.getElementById('conf-module10').style.display="block";
  } else {
    document.getElementById('conf-module10').style.display="none";
  }
}

// function generate_button() {
//   if(document.getElementById('generate_button').style.display=="none") {
//     document.getElementById('generate_button').style.display="block";
//   } else {
//     document.getElementById('generate_button').style.display="none";
//   }
// }
function vanish(){
  if(!(document.getElementById('main-container').style.display=="none")){
    document.getElementById('start-module').style.display="none";
    document.getElementById('costume-module').style.display="none";
    document.getElementById('calendar_module').style.display="none";
    document.getElementById('conf-module3').style.display="none";
    document.getElementById('conf-module4').style.display="none";
    document.getElementById('conf-module5').style.display="none";
    document.getElementById('conf-module6').style.display="none";
    document.getElementById('conf-module7').style.display="none";
    document.getElementById('conf-module8').style.display="none";
    document.getElementById('conf-module9').style.display="none";
    document.getElementById('conf-module10').style.display="none";
    document.getElementById('generate_button').style.display="none";
    // document.getElementById('generate_button').style.display="none";
    document.getElementsByClassName('show-modules')[0].innerHTML="Module anzeigen und wählen";
  }else{
    document.getElementsByClassName('show-modules')[0].innerHTML="Schließen (per Klick)";
    document.getElementById('generate_button').style.display="block";


  }
}




</script>
</html>
