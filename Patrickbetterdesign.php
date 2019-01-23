<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">

  <style>

  .Title {
    left: 5%;
    width: 26%;
    position: relative;
    top: -959px;
    font-size: 35px;
    font-weight: bold;
    color: white;
  }

  .navbar_list{
        display: inline-flex;
        position: relative;
        left: 55%;
        top: -992px;
  }

  li{
    margin: 5px 61px 3px 0;
    list-style-type: none;
  }

  p, a, h1, ul{
    font-family: 'Open Sans', sans-serif;
    color: white;
    text-decoration: none
  }

  a:hover{
    color: white;
    border-bottom: 2px solid white;
    padding-bottom: 20px;
  }

  #pal{
    width: 16%;
    position: relative;
    left: 37%;
    top: -915px;
    font-size: 175px;
    letter-spacing: 35px;
    color: white;
    font-weight: bold;
  }

  .mySlides {
    width: 100%;
    height: 100%;
  }



  </style>
</head>
<body>
  <div class="w3-content w3-section">
  <img class="mySlides" src="teacher-953427_1920.jpg" >
  <img class="mySlides" src="kids-1093758_1920.jpg" >
  <img class="mySlides" src="elementary-school-788902_1920.jpg" >
  <img class="mySlides" src="people-3155982_1920.jpg" >
</div>

  <h2 class="Title">PAL School</h2>
  <div class="col-sm-12">

    <nav class="navbar">
          <ul class="navbar_list">
            <li><a href="#" style="text-decoration: none">Startseite </a></li>
            <li><a href="#" style="text-decoration: none">Information</a></li>
            <li><a href="#" style="text-decoration: none">Login</a></li>
            <li><a href="#" style="text-decoration: none">Submit</a></li>
          </ul>
    </nav>
  </div>

  <p id="pal">PAL</p>

  <form class="login100-form validate-form">
    <span class="login100-form-title">
      Member Login
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
      <input class="input100" type="text" name="email" placeholder="Email">
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
      <input class="input100" type="password" name="pass" placeholder="Password">
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-lock" aria-hidden="true"></i>
      </span>
    </div>

    <div class="container-login100-form-btn">
      <button class="login100-form-btn">
        Login
      </button>
    </div>

    <div class="text-center p-t-12">
      <span class="txt1">
        Forgot
      </span>
      <a class="txt2" href="#">
        Username / Password?
      </a>
    </div>

    <div class="text-center p-t-136">
      <a class="txt2" href="#">
        Create your Account
        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
      </a>
    </div>
  </form>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>
</html>
