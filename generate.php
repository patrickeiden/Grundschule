<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>PAL School</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="Css_Files/index.css">
<title>Page Title</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">PAL School</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Persönliche Seite</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="LogIn.php"><span class="glyphicon glyphicon-log-in"></span>Einloggen</a></li>
      <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span>Registrieren</a></li>
    </ul>
  </div>
</nav>

<?php
//Step 1-3. this container contains all modules available on the site
if(isset($_SESSION['u_id'])){
echo  '<p href="#" class="show-modules" onclick="vanish()" >Show Modules and Choose Some</p>

  <div id="main-container">
  <div class="moduleStart">
    <a onclick="Startmodul()" role="button">Startseitenmodul</a>
  </div>
    <div class="module1">
      <a onclick="module1()" role="button">Custom-Modul</a>
    </div>
    <div class="module2">
      <a onclick="module2()" role="button">Kalendermodul</a>
    </div>
    <div class="module3">
      <a onclick="module3()" role="button">Newsmodul</a>
    </div>
    <div class="module4">
      <a onclick="module4()" role="button">Galeriemodul</a>
    </div>
    <div class="module5">
      <a onclick="module5()" role="button">Jobmodul</a>
    </div>
    <div class="module6">
      <a onclick="module6()" role="button">Anfahrtsmodul</a>
    </div>
    <div class="module7">
      <a onclick="module7()" role="button">Mitarbeitermodul</a>
    </div>
    <div class="module8">
      <a onclick="module8()" role="button">Klassenmodul</a>
    </div>
    <div class="module9">
      <a onclick="module9()" role="button">Einschreibungsmodul</a>
    </div>
    <div class="module10">
      <a onclick="module10()" role="button">Impressumsmodul</a>
    </div>
  </div>

  <form action="generate_html.php" method="POST" autocomplete="off">
  <div id="start-module">
      <div class="form-group">
        <p>Name der Schule:</p>
        <input type="text" class="form-control" id="nameSchool" placeholder="Name der Schule" name="nameSchool" >
        <p>Logo der Schule auswählen:</p>
        <input type="file" name="logo" accept="image/*" required>
        <p>Zwei Bilder für Slider wählen:</p>
        <input type="file" id="school_slider2" name="school_slider2" accept="image/*">
        <p>Überschrift des Textes:</p>
        <input type="text" class="form-control" id="header" placeholder="Überschrift" name="header" required>
        <p>Kurzbeschreibung:</p>
        <textarea name="desciption" cols="40" rows="5" class="desciption" required></textarea>
      </div>
  </div>
  <div id="costume-module">
      <div class="form-group">
        <p>Title:</p>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title">
          <input type ="checkbox" name ="costume_button" value="1"/>
          <p class="events">Diese Box auswählen, um Startseitenmodul abzuschließen</p>
      </div>
  </div>

   <div id="calendar_module">
    <p><b>Kalendermodul</b></p>
    <p>Fügt Ihrer Homepage einen Kalender hinzu, in den Ereignisse und wichtige Daten eingetragen werden können.</p>
    <div class="form-group">
    <input type="checkbox" name="calendar" value="1"/>
    <p class="events">Diese Box auswählen, um Kalendermodul zu integrieren</p>
    </div>
  </div>

  <div id="conf-module3">
    <p>Wählen Sie die Einstellungen für das Newsmodul.</p>
    <p>Wählen Sie, wieviele News pro Seite angezeigt werden sollen (3 bis 5)</p>
    <div class="form-group">
    <h5 class="events_h">Number of News</h5>
    <input type ="radio" name ="news_number" value="3"/>
    <p class="events">3</p>
    <input type ="radio" name ="news_number" value="4"/>
    <p class="events">4</p>
    <input type ="radio" name ="news_number" value="5"/>
    <p class="events">5</p>
    </div>
    <input type ="checkbox" name ="news_button" value="1"/>
    <p class="events">Diese Box auswählen, um Newsmodul zu integrieren</p>
  </div>

  <div id="conf-module4">
    <p>Fügt Ihrer Homepage eine Galerie hinzu, in der Bilder präsentiert werden können.<br>
       You can add a new entry for every case e.g. pictures from a specific day. </p>
    <input type ="checkbox" name ="gallery_button" value="1"/>
    <p class="events">Diese Box auswählen, um Galeriemodul zu integrieren</p>
  </div>

  <div id="conf-module5">
    <p>Fügt Ihrer Website einen Bereich für offene Stellen und Bewerbungen hinzu.</p>
    <input type="checkbox" name="jobs_form" value="Form" />
    <p>Integrated application form</p>
    <p>Wählen Sie, wieviele Stellenangebote pro Seite angezeigt werden sollen (3 bis 5)</p>
    <div class="form-group">
    <h5 class="events_h">Number of News</h5>
    <input type ="radio" name ="job_number" value="3"/>
    <p class="events">3</p>
    <input type ="radio" name ="job_number" value="4"/>
    <p class="events">4</p>
    <input type ="radio" name ="job_number" value="5"/>
    <p class="events">5</p>
    </div>
    <input type="checkbox" name="job_button" value="1" />
    <p class="events">Diese Box auswählen, um Jobmodul zu integrieren</p>
  </div>

  <div id="conf-module6">
  <div class="form-group">
    <p>Beschreibung:</p>
    <textarea name="desciption_anfahrt" cols="40" rows="5" class="desciption_anfahrt"></textarea>
    <p>Adresse:</p>
    <input type="text" class="form-control" id="street_school" placeholder="Straße" name="street_school" >
    <input type="text" class="form-control" id="number_school" placeholder="Nummer" name="number_school" >
    <input type="text" class="form-control" id="plz_school" placeholder="PLZ" name="plz_school" >
    <input type="text" class="form-control" id="ort_school" placeholder="Ort" name="ort_school" >
  </div>
    <input type="checkbox" name="anfahrt_button" value="1" />
    <p class="events">Diese Box auswählen, um Anfahrtsmodul zu integrieren</p>
  </div>

  <div id="conf-module7">
    <p>Fügt Ihrer Homepage eine Auflistung der Mitarbeiter hinzu, die Sie eintragen.</p>
    <input type="checkbox" name="worker_button" value="1" />
    <p class="events">Diese Box auswählen, um Mitarbeitermodul zu integrieren</p>
  </div>

  <div id="conf-module8">
    <p>Fügt Ihrer Homepage eine Auflistung aller Klassen hinzu, die Sie eintragen.</p>
    <input type="checkbox" name="classes_button" value="1" />
    <p class="events">Diese Box auswählen, um Klassenmodul zu integrieren</p>
  </div>

  <div id="conf-module9">
    <p>Fügt Ihrer Homepage ein Einschreibungssytem hinzu.</p>
    <input type="checkbox" name="signup_button" value="1" />
    <p class="events">Diese Box auswählen, um Einschreibungsmodul zu integrieren</p>
  </div>

  <div id="conf-module10">
    <p>Ihre Homepage enthält ein Impressum.</p>
    <textarea name="impressum" cols="40" rows="5" class="impressum" ></textarea><br><br>
  </div>


   <button type="submit" name="test" formmethod="POST">Generate</button>
  </form>';
}else{
  echo  'Bitte loggen Sie sich zuerst ein.';
}

?>


<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/">PAL (Patrick Eiden, Amin Harig, Laura Both)</a>
  </div>
  <!-- Copyright -->

</footer>

</body>

<script>
function Startmodul(){
  if(document.getElementById('start-module').style.display=="none"){
     document.getElementById('start-module').style.display="block";
  }else{
    document.getElementById('start-module').style.display="none";
  }
}

function module1(){
  if(document.getElementById('costume-module').style.display=="none"){
     document.getElementById('costume-module').style.display="block";
  }else{
    document.getElementById('costume-module').style.display="none";
  }
}

function module2(){
  if(document.getElementById('calendar_module').style.display=="none"){
     document.getElementById('calendar_module').style.display="block";
  }else{
    document.getElementById('calendar_module').style.display="none";
  }
}

function module3(){
  if(document.getElementById('conf-module3').style.display=="none"){
     document.getElementById('conf-module3').style.display="block";
  }else{
    document.getElementById('conf-module3').style.display="none";
  }
}

function module4() {
  if(document.getElementById('conf-module4').style.display=="none") {
    document.getElementById('conf-module4').style.display="block";
  } else {
    document.getElementById('conf-module4').style.display="none";
  }
}

function module5() {
  if(document.getElementById('conf-module5').style.display=="none") {
    document.getElementById('conf-module5').style.display="block";
  } else {
    document.getElementById('conf-module5').style.display="none";
  }
}

function module6() {
  if(document.getElementById('conf-module6').style.display=="none") {
    document.getElementById('conf-module6').style.display="block";
  } else {
    document.getElementById('conf-module6').style.display="none";
  }
}

function module7() {
  if(document.getElementById('conf-module7').style.display=="none") {
    document.getElementById('conf-module7').style.display="block";
  } else {
    document.getElementById('conf-module7').style.display="none";
  }
}

function module8() {
  if(document.getElementById('conf-module8').style.display=="none") {
    document.getElementById('conf-module8').style.display="block";
  } else {
    document.getElementById('conf-module8').style.display="none";
  }
}

function module9() {
  if(document.getElementById('conf-module9').style.display=="none") {
    document.getElementById('conf-module9').style.display="block";
  } else {
    document.getElementById('conf-module9').style.display="none";
  }
}

function module10() {
  if(document.getElementById('conf-module10').style.display=="none") {
    document.getElementById('conf-module10').style.display="block";
  } else {
    document.getElementById('conf-module10').style.display="none";
  }
}
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
    document.getElementsByClassName('show-modules')[0].innerHTML="Module anzeigen und wählen";
    document.getElementsByClassName('show-modules')[0].style.backgroundColor="lightgrey";
  }else{
    document.getElementsByClassName('show-modules')[0].innerHTML="Schließen (per Klick)";
    document.getElementsByClassName('show-modules')[0].style.backgroundColor="wheat";

  }
}

$(document).ready(function () {

    $("#main-container").hide();
    $(".show-modules").show();


    $('.show-modules').click(function () {
        $("#main-container").toggle("slide");
        $(".page-footer").css({"top":"23px"});
    });
});


</script>
</html>
