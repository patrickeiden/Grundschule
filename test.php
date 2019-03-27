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

<?php
if(isset($_SESSION['u_id'])){
  echo '<link rel="stylesheet" type="text/css" href="Css_Files/index_Logout.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
}else{
  echo '<link rel="stylesheet" type="text/css" href="Css_Files/index.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
}

?>

<title>Page Title</title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/test.php">Gruschool</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Persönliche Seite</a>
    </div>
    <?php
      if(isset($_SESSION['u_id'])){
        echo '<form action="fun_exe/LogOut_function.php" method="POST">
          <p class="loggedIn">Eingeloggt als: ';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Ausloggen</button></li>
      </form> </div>
    </nav>';
  }else{
    echo '  <form action="fun_exe/LogIn_function.php" method="POST">
      <div class="container">
        <label for="uname"><b>E-Mail</b></label>
        <input type="text" placeholder="E-Mail eingeben" name="email" required>

        <label for="psw"><b>Passwort</b></label>
        <input type="password" placeholder="Passwort eingeben" name="psw" required>
        <label>
          <input type="checkbox" checked="checked" name="remember">Eingeloggt bleiben
        </label>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><button type="submit" name="login" formmethod="POST"><span class="glyphicon glyphicon-log-in"></span>Einloggen</button></li>
        <li><a href="SignUp.php"><span class="glyphicon glyphicon-user"></span>Registrieren</a></li>
      </ul>
    </div>
    </form>
  </nav>';
  }
    ?>

<h1>My First Heading</h1>
<div id="left_container">
  <h3>lalalalalalala</h6>
  <p>Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
</p>
</div>

<div id="generate_button">
  <h1>JETZT EIGENE HOMEPAGE GENERIEREN!</h1>
  <a class="btn btn-warning" href="generate.php" role="button">GENERIEREN</a>
</div>

<div id="right_container">
  <h3>lalalalalalala</h6>
  <p>Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
</p>
</p>
</div>

<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/">PAL (Patrick Eiden, Amin Harig, Laura Both)</a>
  </div>
  <!-- Copyright -->

</footer>

</body>
</html>
