<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
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
  .page-footer{
    top: 307px;
    width: 100%;
  }
  body {
    background-color: mediumslateblue; //darkmagenta
  }
  h3 {
    color: white;
  }
  .bottom {
    margin-bottom: 100px;
  }
  footer {
      position: absolute;
      bottom: 10px;
      left: 47%;
      color: white;
  }
  .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 85%;
      margin-top: 10px;
    }
    hr {
      background-color: white;
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
                    <li><a href="ueberuns.php" style="text-decoration: none">Über Uns</a></li>
                    <li><a href="interface.php" style="text-decoration: none">Interface</a></li>
                  </ul>
                  </nav>
                  <hr>
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
    <div class="col-sm-4 text-center">
      <div id="interface_generate_button">
        <h3 class="text">Generate your Website</h3>
        <a class="btn btn-success btn-lg" href="generate.php" role="button">Generate</a>
        <br>
        <br>
        <p> Text </p>
      </div>
    </div>
    <div class="col-sm-4 text-center">
      <div id="interface_personal_button">
        <h3 class="text">Change your personal data</h3>
        <a class="btn btn-success btn-lg" href="personal_data.php" role="button">Data</a>
        <br>
        <br>
        <p> Text </p>
      </div>
    </div>
    <div class="col-sm-4 text-center">
      <div id="interface_manage_button">
        <h3 class="text">Change settings on your generated site</h3>
        <a class="btn btn-success btn-lg" href="personalSite.php" role="button">Personal Site</a>
        <br>
        <br>
        <p> Text </p>
      </div>
  </div>
</div>

<footer class="text-center">

  <!-- Copyright -->
  <div class="footer">© 2018 Copyright</div>
  <!-- Copyright -->

</footer>
</div>


</body>
</html>
