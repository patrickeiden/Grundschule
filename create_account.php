<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PAL School</title>
  <link rel="stylesheet" type="text/css" href="Css_Files/startsite.css">
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
  <style>

    input.form-control {
      width: 80%;
      margin-bottom:20px;
      padding: 20px;
    }

    input.form-control.email {
      margin-right: 0px!important;
      display: inline;
      font-size: 16px;
      margin-bottom: 0px;
    }
    html, body{
      height: 100%;
    }

    body{
      background-color: black;
      background-image: url("Images/elementary-school-788902_1920.jpg");
      background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: left top;
    }

    .title {
      color: white;
      left: 50%;
      font-size: 25px;
    }

    footer {
      position: absolute;
      /*top: 50px;*/
      top: 95%;
      left: 47%;
      font-size: 1rem;
    }

    .abstand {
      /*margin-top: 50px;*/
      text-align: center;
    }

    hr {
      background-color: white;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 90%;
    }

  </style>

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <nav class="navbar">
        <h2 class="Title">PAL School</h2>
        <?php
          if(isset($_SESSION['u_id'])){
            echo '
                  <ul class="navbar_list">
                    <li><a href="startsite.php" style="text-decoration: none">Startseite </a></li>
                    <li><a href="create_account.php" style="text-decoration: none">Registrieren</a></li>
                    <li><a  href="anmeldung.php" style="text-decoration: none">Anmelden</a></li>
                    <li><a href="ueberuns.php" style="text-decoration: none">Über uns</a></li>
                    <li><a href="interface.php" style="text-decoration: none">Interface</a></li>
                  </ul>
                  </nav>
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
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

    <div class="abstand">
    <hr/>
      <p class="title">Ihr Konto erstellen</p>
    <hr/>
    </div>
  </div>
  </div>

  <div class="row">
    <div class="col-sm-12">

    <div class="wrapper fadeInDown">
      <form action="fun_exe/SignUp_function.php" method="POST">

        <div class="col-sm-6 text-center">
          <!-- <div> -->
            <input type="text" class="form-control" placeholder="E-Mail" name="E-Mail" required>
          <!-- </div> -->
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Passwort" name="Passwort" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Vorname" name="Vorname" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Nachname" name="Nachname" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Geschlecht" name="Geschlecht" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Geburtsdatum" name="Geburtsdatum" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Adresse" name="Adresse" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="PLZ" name="PLZ" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" rows="3" placeholder="Bezahlungsart" name="Zahlungsart" required>
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Notiz" name="Notiz" required>
          </div>
        </div>

        <div class="col-sm-12">
          <button type="submit" name="submit" class="btn btn-danger btn-lg btn-block center" formmethod="POST">Absenden</button>
        </div>
      </div>

    </form>
  </div>
    </div>
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


    </body>
    </html>
