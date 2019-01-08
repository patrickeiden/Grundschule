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


  <link rel="stylesheet" type="text/css" href="index.css">
<title>Page Title</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/test.php">Gruschool</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="LogIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<?php
if(isset($_SESSION['u_id'])){
echo  '<p href="#" class="show-modules" onclick="vanish()" >Show Modules and Choose Some</p>

  <div id="main-container">
    <div class="module1">
      <a onclick="module1()" role="button">Costume Module</a>
    </div>
    <div class="module2">
      <a onclick="module2()" role="button">Kalender Module</a>
    </div>
    <div class="module3">
      <a onclick="module3()" role="button">News Module</a>
    </div>
  </div>

  <form action="generate_html.php" method="POST">
  <div id="costume-module">
      <div class="form-group">
        <p>Title:</p>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title">
      </div>
    <div class="form-group">
      <p>Code</p>
      <textarea name="code" cols="40" rows="5" id="code"></textarea>
      <input type ="checkbox" name ="costume_button" value="1"/>
      <p class="events">Check this Box if you want to include this Module</p>
    </div>
  </div>

  <div id="conf-module2">
    <p>Google Kalender</p>
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
    <input type ="checkbox" name ="costume_button" value="1"/>
    <p class="events">Check this Box if you want to include this Module</p>
  </div>
   <button type="submit" name="test" formmethod="POST">Generate</button>
  </form>';
}else{
  echo "log in bitch";
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

function module1(){
  if(document.getElementById('costume-module').style.display=="none"){
     document.getElementById('costume-module').style.display="block";
  }else{
    document.getElementById('costume-module').style.display="none";
  }
}

function module2(){
  if(document.getElementById('conf-module2').style.display=="none"){
     document.getElementById('conf-module2').style.display="block";
  }else{
    document.getElementById('conf-module2').style.display="none";
  }
}

function module3(){
  if(document.getElementById('conf-module3').style.display=="none"){
     document.getElementById('conf-module3').style.display="block";
  }else{
    document.getElementById('conf-module3').style.display="none";
  }
}

function vanish(){
  if(!(document.getElementById('main-container').style.display=="none")){
    document.getElementById('costume-module').style.display="none";
    document.getElementById('conf-module2').style.display="none";
    document.getElementById('conf-module3').style.display="none";
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
