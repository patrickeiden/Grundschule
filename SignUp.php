<!DOCTYPE html>
<!-- Seite zur Registrierung, also zur Erstellung neuer Benutzerkonten bei PAL School -->
<html>
<head>
  <title>PAL School</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="Css_Files/SignUp.css">
<title>Sign Up</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">PAL School</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span>Registrieren</a></li>
      <li><a href="LogIn.php"><span class="glyphicon glyphicon-log-in"></span>Einloggen</a></li>
    </ul>
  </div>
  </nav>

  <!-- Formular mit Eingabefeldern für E-Mail-Adresse, Passwort etc. -->
  <!-- Diese Daten werden überprüft (z.B. auf strukturelle Gültigkeit der E-Mail-Adresse) -->
  <!-- und dann in der Datenbank gespeichert -->

  <form action="fun_exe/SignUp_function.php" style="border:1px solid #ccc" method="POST">
    <div class="container">
      <h1>Registrieren</h1>
      <p>Füllen Sie bitte folgendes Formular aus, um ein Konto zu erstellen.</p>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">Eingeloggt bleiben
      </label>

      <p>Durch das Erstellen eines Kontos stimmen Sie unseren <a href="#" style="color:dodgerblue">AGBs und Datenschutzrichtlinien</a> zu.</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Abbrechen</button>
        <button type="submit" class="signupbtn" name="next_test" formmethod="POST">Registrieren</button>
      </div>
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
