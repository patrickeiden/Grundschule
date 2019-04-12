<?php

session_start();
?>

<!DOCTYPE html>
<html>
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


/*  footer {
      position: absolute;
      bottom: 10px;
      left: 47%;
      color: white;
  }*/

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

  </style>

</head>

 <?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "news");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['u_mail'];

if(isset($_POST['update']))
{

  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $Firstname = $_POST['Firstname'];
  $Lastname = $_POST['Lastname'];
  $Gender = $_POST['Gender'];
  $Birthdate = $_POST['Birthdate'];
  $Adress = $_POST['Adress'];
  $PLZ = $_POST['PLZ'];
  $Note = $_POST['Note'];


  $update = "UPDATE Person SET Email = '$Email', Password = '$Password', Firstname = '$Firstname', Lastname = '$Lastname', Gender = '$Gender', Birthdate = '$Birthdate', Adress = '$Adress', PLZ = '$PLZ', Note = '$Note' WHERE Email = '$email'";

  $retval = mysqli_query(  $conn ,$update);
  if(! $retval )
  {
    die('Could not update data: ' . mysqli_error());
  }
  echo "<script type= 'text/javascript'>alert('Updated data successfully');</script>";

}

$sql = "SELECT Person_id, Email, Password, Firstname, Lastname, Gender, Birthdate, Adress, PLZ, Payment, Note FROM Person WHERE Email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $Email = $row["Email"];
      $Password = $row["Password"];
      $Firstname = $row["Firstname"];
      $Lastname = $row["Lastname"];
      $Gender = $row["Gender"];
      $Birthdate = $row["Birthdate"];
      $Adress = $row["Adress"];
      $PLZ = $row["PLZ"];
      $Payment = $row["Payment"];
      $Note = $row["Note"];

    }
} else {
    echo "0 results";
}

?>

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
                  </ul>
                  </nav>
                  <hr>
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

  <div class="row">
    <div class="col-sm-12">
      <hr/>
        <p class="title">Ihre persönliche Daten editieren</p>
      <hr/>
    </div>
  </div>
    <div class="row">
      <div class="col-sm-12">

      <br>
          <form method="post" action="<?php $_PHP_SELF ?>">
            <div class="col-sm-12 text-center">
              <input type="email" class="form-control email" name="Email" value="<?php echo $Email;?>" placeholder="E-Mail" readonly/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="password" class="form-control email" name="Password" value="<?php echo $Password;?>" placeholder="Passwort"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname;?>" placeholder="Vorname"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname;?>" placeholder="Nachname"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Gender" value="<?php echo $Gender;?>" placeholder="Geschlecht"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Birthdate" value="<?php echo $Birthdate;?>" placeholder="Geburtsdatum"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Adress" value="<?php echo $Adress;?>" placeholder="Adresse"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="PLZ" value="<?php echo $PLZ;?>" placeholder="PLZ"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Note" value="<?php echo $Note;?>" placeholder="Notiz"/>
            </div>
            <div class="col-sm-12 text-center">
              <button type="submit" value="Submit" name="update" class="btn btn-primary btn-lg btn-block center" value="Update">Speichern</button>
            </div>
          </form>
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
</div>


</body>
</html>
