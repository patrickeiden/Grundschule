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

<!-- <div class="col-sm-2">bla</div>
<div class="col-sm-8">    
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

$sql = "SELECT mail, password FROM registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row["mail"] == $_SESSION['u_mail'] )
        echo "E-Mail:";
        echo "</br>";
        echo "<input type='text' name= 'mail' value=". $_SESSION['u_mail']. '>' . "<br>";
        echo "Password:";
        echo "</br>";
        echo "<input type='text' name= 'mail' value=". $row["password"]. '>' . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
</div> -->

<!-- <div class="col-sm-2"></div> -->
<!-- <div class="col-sm-8">
  <form>
    <div class="form-group">
    <label for="name">Name</label>
    <input type="email" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="email"><?php echo $row1['employee_email']; ?></label>
    <input type="email" class="form-control" id="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

<div class="col-sm-3"></div>
<form>
  <div class="form-row">
    <div class="col-sm">
      <input type="text" class="form-control" placeholder="First name">
      <input type="text" class="form-control" placeholder="Last name">
    </div>
  </div>
</br>
<div class="form-row">
    <div class="col-sm-3"></div>
    <div class="col-sm">
      <input type="text" class="form-control" placeholder="Gender">
      <input type="text" class="form-control" placeholder="Date of birth">
    </div>
  </div>
</br>
  <div class="form-row">
    <div class="col-sm-3"></div>
    <div class="col-sm">
      <input type="text" class="form-control" placeholder="Gender">
      <input type="text" class="form-control" placeholder="Date of birth">
    </div>
  </div>
</br>
  <div class="form-row">
    <div class="col-sm-3"></div>
    <div class="col-sm">
      <input type="text" class="form-control" rows="3" placeholder="Adress">
      <input type="text" class="form-control" placeholder="PLZ">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    <footer class="page-footer font-small blue">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://mdbootstrap.com/education/bootstrap/"> Patrick Eiden und die annere banause</a>
      </div>
      <!-- Copyright -->

    </footer>
<!-- </div>
 -->
    </body>
    </html>
