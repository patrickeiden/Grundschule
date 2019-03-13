
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
      margin: 0px!important;
      display: inline;
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
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://localhost/Grundschule/startsite.php">Gruschool</a>
      <a class="navbar-brand" href="http://localhost/Grundschule/interface.php">Personal Site</a>
    </div>
  </div>
  </nav>

<div class="container">
  <div class="row">
    <hr>
      <h3 class="text-center">Create your account</h3>
    <hr>
    <br>
      <form action=" " method="post">

        <div class="col-sm-6 text-center">
          <!-- <div> -->
            <input type="email" class="form-control email" placeholder="E-Mail" name="Email">
          <!-- </div> -->
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="password" class="form-control" placeholder="Password" name="Password">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Lastname" name="Lastname">            
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Firstname" name="Firstname">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Gender" name="Gender">
          </div>
        </div>
        
        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Date of birth" name="Birthdate">
          </div>
        </div>    

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Adress" name="Adress">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="PLZ" name="PLZ">
          </div>
        </div>
      
        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" rows="3" placeholder="Payment" name="Payment">
          </div>
        </div>

        <div class="col-sm-6 text-center">
          <div>
            <input type="text" class="form-control" placeholder="Note" name="Note">
          </div>
        </div>

        <div class="col-sm-12">
          <button type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>
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


    </body>
    </html>
