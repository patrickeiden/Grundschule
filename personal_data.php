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
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/test.php">Gruschool</a>
    </div>
    <?php
        echo '<form action="fun_exe/LogOut_function.php" method="POST">
          <p class="loggedIn"> Logged in with:';
        echo $_SESSION['u_mail'];
        echo '<button type="submit" name="logout" formmethod="POST" class="logout">Logout</button></li>
      </form> </div>
    </nav>';

    ?>




<div class="container">
  <div class="row">

    <h3 class="text-center">Add your personal Data</h3>
    </br>
    <form action=" " method="post">
      <div class="form-row">
        <!-- <div class="col-sm-3"></div> -->
        <div class="text-center">
          <input type="text" class="form-control" placeholder="First name" name="Firstname">
          <input type="text" class="form-control" placeholder="Last name" name="Lastname">
        </div>
      </div>
    </br>
    <div class="form-row">
        <!-- <div class="col-sm-3"></div> -->
        <div class="text-center">
          <input type="text" class="form-control" placeholder="Gender" name="Gender">
          <input type="text" class="form-control" placeholder="Date of birth" name="Birthdate">
        </div>
      </div>
    </br>
      <div class="form-row">
        <!-- <div class="col-sm-3"></div> -->
        <div class="text-center">
          <input type="text" class="form-control" placeholder="Adress" name="Adress">
          <input type="text" class="form-control" placeholder="PLZ" name="PLZ">
        </div>
      </div>
    </br>
      <div class="form-row">
        <!-- <div class="col-sm-3"></div> -->
        <div class="text-center">
          <input type="text" class="form-control" rows="3" placeholder="Payment" name="Payment">
          <input type="text" class="form-control" placeholder="Note" name="Note">
        </div>
      </div>
    </br>
    <div class="form-row">
      <!-- <div class="col-sm-3"></div> -->
      <div>
      <button type="submit" value="Submit" name="submit" class="center-block btn btn-primary">Submit</button>
      </div>
      <div class="col-sm-3"></div>
    </div>
    </form>
  </div>
</div>



    <footer class="page-footer font-small blue">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
      </div>
      <!-- Copyright -->

    </footer>
<!-- </div>
 -->

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

$sql = "INSERT INTO Person(Firstname, Lastname, Gender, Birthdate, Adress, PLZ, Payment, Note)
VALUES ('".$_POST["Firstname"]."','".$_POST["Lastname"]."','".$_POST["Gender"]."','".$_POST["Birthdate"]."','".$_POST["Adress"]."','".$_POST["PLZ"]."','".$_POST["Payment"]."','".$_POST["Note"]."')";

$result = mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
}
?>
    </body>
    </html>
