<?php

session_start();
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
<title>Page Title</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">Gruschool</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Personal Site</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="LogIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>

<?php
//Step 1-3. this container contains all modules available on the site
if(isset($_SESSION['u_id'])){
echo  '<p href="#" class="show-modules" onclick="vanish()" >Show Modules and Choose Some</p>

  <div id="main-container">
  <div class="moduleStart">
    <a onclick="Startmodul()" role="button">Start Modul</a>
  </div>
    <div class="module1">
      <a onclick="module1()" role="button">Costume Modul</a>
    </div>
    <div class="module2">
      <a onclick="module2()" role="button">Kalender Modul</a>
    </div>
    <div class="module3">
      <a onclick="module3()" role="button">News Modul</a>
    </div>
    <div class="module4">
      <a onclick="module4()" role="button">Galerie Modul</a>
    </div>
    <div class="module5">
      <a onclick="module5()" role="button">Job Modul</a>
    </div>
    <div class="module6">
      <a onclick="module6()" role="button">Anfahrt Modul</a>
    </div>
    <div class="module7">
      <a onclick="module7()" role="button">Mitarbeiter Modul</a>
    </div>
    <div class="module8">
      <a onclick="module8()" role="button">Klassen Modul</a>
    </div>
    <div class="module9">
      <a onclick="module9()" role="button">Einschreibungs Modul</a>
    </div>
    <div class="module10">
      <a onclick="module10()" role="button">Impressum Modul</a>
    </div>
  </div>

  <form action="generate_html.php" method="POST" autocomplete="off">
  <div id="start-module">
      <div class="form-group">
        <p>Name der Schule:</p>
        <input type="text" class="form-control" id="nameSchool" placeholder="Name der Schule" name="nameSchool" >
        <p>Wählen sie ihr Schullogo</p>
        <input type="file" name="logo" accept="image/*" required>
        <p>Wählen sie ein Bild für den Slider:</p>
        <input type="file" id="school_slider" name="school_slider" accept="image/*">
        <p>Überschrift des Textes:</p>
        <input type="text" class="form-control" id="header" placeholder="Überschrift" name="header" required>
        <p>Beschreibungstext:</p>
        <textarea name="desciption" cols="40" rows="5" class="desciption" required></textarea>
      </div>
  </div>
  <div id="costume-module">
      <div class="form-group">
        <p>Title:</p>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title">
          <input type ="checkbox" name ="costume_button" value="1"/>
          <p class="events">Check this Box if you want to include this Module</p>
      </div>
  </div>

   <div id="calendar_module">
    <p><b>Calendar module</b></p>
    <p>Your site will contain an editable calendar showing events and important dates.</p>
    <div class="form-group">
    <input type="checkbox" name="calendar" value="1"/>
    <p class="events">Check this box if you want to include this calendar module</p>
    </div>
  </div>

  <div id="conf-module3">
    <p>If you want to include news on your website select your prefered settings</p>
    <p> choose a number between 3-5 to select the number of news your site will show on the front page</p>
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
    <p class="events">Check this Box if you want to include this module</p>
  </div>

  <div id="conf-module4">
    <p>Your site will contain a page with a Galerie containing pictures.<br>
       You can add a new entry for every case e.g. pictures from a specific day. </p>
    <input type ="checkbox" name ="gallery_button" value="1"/>
    <p class="events">Check this Box if you want to include this module</p>
  </div>

  <div id="conf-module5">
    <p>Your site will contain a page with jobs offered by your school.</p>
    <input type="checkbox" name="jobs_form" value="Form" />
    <p>Integrated application form</p>
    <p> choose a number between 3-5 to select the number of news your site will show on the front page</p>
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
    <p class="events">Check this box if you want to include this module</p>
  </div>

  <div id="conf-module6">
  <div class="form-group">
    <p>Beschreibung:</p>
    <textarea name="desciption_anfahrt" cols="40" rows="5" class="desciption_anfahrt"></textarea>
    <p>Adresse:</p>
    <input type="text" class="form-control" id="street_school" placeholder="Straße" name="street_school" >
    <input type="text" class="form-control" id="number_school" placeholder="Straßen Nummer" name="number_school" >
    <input type="text" class="form-control" id="plz_school" placeholder="PLZ" name="plz_school" >
    <input type="text" class="form-control" id="ort_school" placeholder="Ort" name="ort_school" >
  </div>
    <input type="checkbox" name="anfahrt_button" value="1" />
    <p class="events">Check this box if you want to include this module</p>
  </div>

  <div id="conf-module7">
    <p>Ihre Seite enthält eine Auflistung aller Mitarbeiter, die sie eintragen.</p>
    <input type="checkbox" name="worker_button" value="1" />
    <p class="events">Check this box if you want to include this module</p>
  </div>

  <div id="conf-module8">
    <p>Ihre Seite enthält eine Auflistung aller Klassen, die sie eintragen.</p>
    <input type="checkbox" name="classes_button" value="1" />
    <p class="events">Check this box if you want to include this module</p>
  </div>

  <div id="conf-module9">
    <p>Ihre Seite enthält ein Einschreibungssytem.</p>
    <input type="checkbox" name="signup_button" value="1" />
    <p class="events">Check this box if you want to include this module</p>
  </div>

  <div id="conf-module10">
    <p>Ihre Seite enthält ein Impressum.</p>
    <textarea name="impressum" cols="40" rows="5" class="impressum" ></textarea><br><br>
  </div>


   <button type="submit" name="test" formmethod="POST">Generate</button>
  </form>';
}else{
  echo  'pls login';
}

?>


<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
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
    document.getElementsByClassName('show-modules')[0].innerHTML="Show Modules and Choose Some";
    document.getElementsByClassName('show-modules')[0].style.backgroundColor="lightgrey";
  }else{
    document.getElementsByClassName('show-modules')[0].innerHTML="Click to close";
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
