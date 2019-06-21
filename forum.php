<?php

session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html>
<head>

  <title>PAL Forum</title>

  <?php
  if(isset($_SESSION['u_id'])){
    echo '
    <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">
    <link rel="stylesheet" type="text/css" href="Css_Files/forum.css">';
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
  <link rel="stylesheet" type="text/css" href="Css_Files/design.css">

  <style>

  input.form-control {
    width: 80%;
    margin-bottom:20px;
    padding: 20px;
  }

  input.form-control.email {
    display: inline;
    text-align: center;
    font-size: 16px;
  }

  body {
    background-color: #BAB2B5;
    margin-top: 8px;
  }
  h3 {
    color: white;
  }
  .bottom {
    margin-bottom: 50px;
  }

  .btn:hover {
   padding-top: 15px;
   padding-left: 20px;
   padding-right: 20px;
 }
 .Title {
   font-size: 32px;
   font-weight: bold;
   color: white;
   margin-top: 30px;
 }
 .text-right{
   color: white;
 }

  hr {
      background-color: white;
  }
  .title {
      color: white;
      left: 50%;
      font-size: 25px;
      text-align: center;
  }
  .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 80%;
  }

  .Title {
    font-size: 32px;
    font-weight: bold;
    color: white;
    margin-top: 30px;
    position: relative;
    right: 16%;
  }

   footer {
      position: absolute;
      bottom: 10px;
      left: 47%;
      color: white;
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
                    <li><a href="forum.php" style="text-decoration: none">Forum</a></li>
                  </ul>
                  </nav>
                  <hr>
                  <form action="fun_exe/LogOut_function.php" method="POST">
                          <p class="loggedIn text-right">Angemeldet als: ';
                  echo $_SESSION['u_mail'];
                  // echo "<br>";
                  echo    '<button type="submit" name="logout" formmethod="POST" class="logout text-right">Abmelden</button>

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

<div class="row">
  <div class="col-sm-5">
    <?php 
      $var = allQuestions();
      echo $var;

    ?>
  </div>
  <div class="col-sm-2"></div>
  <div class="col-sm-5">
    <h4>Hier können sie eine Frage stellen</h4>
    <div id="question_field">
      <input type="text" class="question_title" name="question_title" placeholder="Titel"/>
      <textarea style="resize: none;" name="question_text" class="question_text" cols="40" rows="5"></textarea>
      <button type="submit" class="btn btn-info newQuestion" name="newQuestion" formmethod="POST"></button>
    </div>
  </div>

</div>  
<footer>
  <!-- Copyright -->
  <div class="footer text-center">
    <p>© 2019 Copyright</p>
  </div>
  <!-- Copyright -->

</footer>
</div>




</body>
<script>
  $(".newQuestion").click(function () {
          var title =  $("input[name=question_title]")[0].value;
          var text = $("textarea[name=question_text]")[0].value;
          $.ajax({
            type: "POST",
            url: "onChange2.php",
            data: {
              ForumTitle:title, ForumText:text
            }
          });
          location.reload();
        });
</script>
</html>
