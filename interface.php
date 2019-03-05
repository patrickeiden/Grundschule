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

  <link rel="stylesheet" type="text/css" href="Css_Files/index_Logout.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/index.css">


<title>Page Title</title>
<style>
  .page-footer{
    top: 307px;
    width: 100%;
  }
</style>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="startsite.php">Gruschool</a>
    </div>
    <?php
        echo '<form action="fun_exe/LogOut_function.php" method="POST">
          <p class="loggedIn"> Logged in with:';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button></li>
      </form> </div>
    </nav>';

    ?>
<div id="interface_generate_button">
  <h1 class="text">Generate your Website</h1>
  <a class="btn btn-warning" href="generate.php" role="button">Generate</a>
</div>

<div id="interface_personal_button">
  <h1 class="text">Change your personal data</h1>
  <a class="btn btn-warning" href="personal_data.php" role="button">Data</a>
</div>

<div id="interface_manage_button">
  <h1 class="text">Change settings on your generated site</h1>
  <a class="btn btn-warning" href="personalSite.php" role="button">Personal Site</a>
</div>

    <footer class="page-footer font-small blue">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
      </div>
      <!-- Copyright -->

    </footer>

    </body>
    </html>
