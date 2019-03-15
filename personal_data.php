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

  <style>

    input.form-control {
      width: 80%;
      margin-bottom:20px;
      padding: 20px;
    }

    input.form-control.email {
      display: inline;
    }

  </style>

</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">Gruschool</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Personal Site</a>
    </div>
    <?php
        echo '<form action="fun_exe/LogOut_function.php" method="POST">
          <p class="loggedIn"> Logged in with:';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button></li>
      </form> </div>
    </nav>';

    ?>

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

  <div class="container">
    <div class="row">
      <hr>
        <h3 class="text-center">Your Personal Data</h3>
      <hr>
      <br>
          <form method="post" action="<?php $_PHP_SELF ?>">
            <div class="col-sm-12 text-center">
              <input type="email" class="form-control email" name="Email" value="<?php echo $Email;?>" placeholder="Email" readonly/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="password" class="form-control" name="Password" value="<?php echo $Password;?>" placeholder="Password"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname;?>" placeholder="Firstname"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname;?>" placeholder="Lastname"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Gender" value="<?php echo $Gender;?>" placeholder="Gender"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Birthdate" value="<?php echo $Birthdate;?>" placeholder="Birthdate"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Adress" value="<?php echo $Adress;?>" placeholder="Adress"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="PLZ" value="<?php echo $PLZ;?>" placeholder="PLZ"/>
            </div>
            <div class="col-sm-12 text-center">
              <input type="text" class="form-control" name="Note" value="<?php echo $Note;?>" placeholder="Note"/>
            </div>
            <div class="col-sm-12 text-center">
              <button type="submit" value="Submit" name="update" class="btn btn-primary btn-lg btn-block" value="Update">Save Changes</button>
            </div>
          </form>
    </div>
  </div>


  <div class="col-sm-12">
    <footer class="page-footer font-small blue">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
      </div>
      <!-- Copyright -->

    </footer>
</div>


</body>
</html>
