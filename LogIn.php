<!DOCTYPE html>
<html>
<head>
  <title>PAL School</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">
<title>Registrieren</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="startsite.php">PAL School</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span>Registrieren</a></li>
      <li><a href="LogIn.php"><span class="glyphicon glyphicon-log-in"></span>Anmelden</a></li>
    </ul>
  </div>
  </nav>

  <h2>Anmeldung</h2>

  <form action="fun_exe/LogIn_function.php" method="POST">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>E-Mail</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Passwort</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" name="login" formmethod="POST">Anmelden</button>
      <label>
        <input type="checkbox" checked="checked" name="remember">Angemeldet bleiben
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Abbrechen</button>
      <span class="psw"><a href="#">Passwort vergessen?</a></span>
    </div>
  </form>

<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/">PAL (Patrick Eiden, Amin Harig, Laura Both)</a>
  </div>
  <!-- Copyright -->

</footer>

</body>
</html>
