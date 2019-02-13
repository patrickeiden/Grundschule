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
      background-image: url("Images/elementary-school-788902_1920.jpg");
      background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: left top;
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
    echo '<form action="fun_exe/LogOut_function.php" method="POST">
            <p class="loggedIn"> Logged in with:';
    echo $_SESSION['u_mail'];
    echo    '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button>

  </form>
</nav>';
}else{
echo '
        <ul class="navbar_list">
          <li><a href="#" style="text-decoration: none">Personal Site </a></li>
          <li><a href="#" style="text-decoration: none">Information</a></li>
          <li><a href="#" style="text-decoration: none">Contact</a></li>
          <li><a  href="SignUp.php" style="text-decoration: none">SignUp</a></li>
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
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="Enter Email" required>
            <input type="text" id="password" class="fadeIn third" name="psw" placeholder="Enter Password" required>
            <input type="submit" class="fadeIn fourth" value="Log In" name="login" formmethod="POST">
          </form>
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
</script>
</html>
