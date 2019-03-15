
<!DOCTYPE html>
<html>
<head>
  <title>Gruschool</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Css_Files/design.css">

  <!-- <link rel="stylesheet" type="text/css" href="Css_Files/index_Logout.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/index.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="Css_Files/design.css"> -->


<!--   <?php
  if(isset($_SESSION['u_id'])){
    echo '
    <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
  }else{
    echo '<link rel="stylesheet" type="text/css" href="Css_Files/index.css">
    <link rel="stylesheet" type="text/css" href="Css_Files/LogIn.css">';
  }

  ?> -->

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
      margin-top: 50px;
      text-align: center;
    }

    hr {
      background-color: white;
    }

  </style>

  <?php
if(isset($_POST["submit"])){
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password, "news");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$sql = "INSERT INTO Person(Email, Password, Firstname, Lastname, Gender, Birthdate, Adress, PLZ, Payment, Note)
VALUES ('".$_POST["Email"]."','".$_POST["Password"]."','".$_POST["Firstname"]."','".$_POST["Lastname"]."','".$_POST["Gender"]."','".$_POST["Birthdate"]."','".$_POST["Adress"]."','".$_POST["PLZ"]."','".$_POST["Payment"]."','".$_POST["Note"]."')";

// $result = mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>

</head>
<body>

<div class="container">

  <div class="row">
    <div class="col-sm-12 text-center">
      <nav class="navbar">
        <h2 class="Title">PAL School</h2>
          <ul class="navbar_list">
            <li><a href="startsite.php" style="text-decoration: none">Startseite </a></li>
            <li><a href="create_account.php" style="text-decoration: none">Registrieren</a></li>
            <li><a  href="anmeldung.php" style="text-decoration: none">Anmelden</a></li>
            <li><a href="ueberuns.php" style="text-decoration: none">Über Uns</a></li>
          </ul>
        </nav>
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

    <br>
      <form action=" " method="post">

        <div class="col-sm-6 text-center">
          <!-- <div> -->
            <input type="email" class="form-control email text-center" placeholder="E-Mail" name="Email">
          <!-- </div> -->
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="password" class="form-control email text-center" placeholder="Passwort" name="Password">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Vorname" name="Firstname">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Nachname" name="Lastname">            
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Geschlecht" name="Gender">
          </div>
        </div>
        
        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Geburtsdatum" name="Birthdate">
          </div>
        </div>    

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Adresse" name="Adress">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="PLZ" name="PLZ">
          </div>
        </div>
      
        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" rows="3" placeholder="Bezahlungsart" name="Payment">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Notiz" name="Note">
          </div>
        </div>

        <div class="col-sm-12">
          <button type="submit" value="Submit" name="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
        </div>
      </div>

    </form>
  </div>
  </div>
</div>


    <footer>

      <!-- Copyright -->
      <div class="footer text-center">
        <p>© 2018 Copyright</p>
      </div>
      <!-- Copyright -->

    </footer>



    </body>
    </html>
