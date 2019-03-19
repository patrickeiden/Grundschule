<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PAL School</title>
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
  <style>
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
    footer {
      position: absolute;
      bottom: 10px;
      left: 47%;
    }
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 85%;
      margin-top: 10px;
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
            <li><a href="ueberuns.php" style="text-decoration: none">Über Uns</a></li>
            <li><a href="interface.php" style="text-decoration: none">Interface</a></li>
          </ul>
          </nav>
          <form action="fun_exe/LogOut_function.php" method="POST">
                  <p class="loggedIn text-right"> Logged in with: ';
          echo $_SESSION['u_mail'];
          // echo "<br>";
          echo    '<button type="submit" name="logout" formmethod="POST" class="logout text-right">Logout</button>

          </form>';
}else{
echo '
        <ul class="navbar_list">
          <li><a href="startsite.php" style="text-decoration: none">Startseite </a></li>
          <li><a href="create_account.php" style="text-decoration: none">Registrieren</a></li>
          <li><a  href="anmeldung.php" style="text-decoration: none">Anmelden</a></li>
          <li><a href="ueberuns.php" style="text-decoration: none">Über Uns</a></li>
        </ul>
      </nav>';
}
?>

    </div>
  </div>

    <div class="row">
      <div class="col-sm-12">
        <p id="pal">PAL</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="wrapper fadeInDown">
        <div id="formContent">
          <form action="fun_exe/LogIn_function.php" method="POST" autocomplete="off">
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="E-Mail" required>
            <input type="text" id="password" class="fadeIn third" name="psw" placeholder="Passwort" required>
            <!-- <input type="submit" class="fadeIn fourth center" value="Anmelden" name="login" formmethod="POST"> -->
            <br>
            <button type="submit" value="Anmelden" name="login" class="btn btn-primary btn-lg btn-block center" formmethod="POST">Anmelden</button>
          </form>
          <div id="formFooter">
            <a class="underlineHover" href="#">Passwort vergessen?</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center">

      <!-- Copyright -->
      <div class="footer">
        <p>© 2018 Copyright</p>
      </div>
      <!-- Copyright -->

  </footer>

</body>
</html>
