<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="LogIn.css">
  <style>

    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      padding: 15px;
      margin-left: 649px;
      margin-top: -58px;
    }

    .Title {
      color: white;
      margin-left: -1141px;
      margin-bottom: -494px;
      position: relative;
      top: -498px;
    }

    .screen{
      height: 500px;
      background-attachment: fixed;
      background-color: black;
    }

    .glyphicon {
    	color: orange;
    }

    .noHover{
    pointer-events: none;
    }

    p, a, h1, ul{
    	font-family: 'Poppins', sans-serif;
      color: white;
      text-decoration: none
    }

    a:hover{
      color: white;
      border-bottom: 2px solid white;
      padding-bottom: 20px;
    }

    .container{

    }

    li{
      margin: 5px 32px 3px 0;
      list-style-type: none;
    }

    .navbar_list{
          display: inline-flex;
    }

    a {
    	color: white;
    	font-size: 15px;
    	text-transform: uppercase;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: black;
      color: black;
      padding: 15px;
      margin-top: 600px;
    }

    .dot {
      height: 100px;
      width: 100px;
      background-color: #bbb;
      border-radius: 50%;
      position: relative;
      display: inline-block;
      top: 605px;
      background-color: orange;
      right: -123px;
      margin-right: 257px;
      margin-top: -50px;
    }

    .dotone{
      position: relative;
      top: 617px;
      color: black;
      margin-left: -731px;
      font-size: 20px;
    }

    .dottwo{
      position: relative;
      top: 584px;
      color: black;
      font-size: 20px;
      width: 20%;
      left: 583px;
    }

    .dotthree{
      position: relative;
      top: 548px;
      color: black;
      font-size: 20px;
      width: 20%;
      left: 944px;
    }

    .submit_span{

    }

    .signup_span{

    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    img {
    height: 100%;
    }

    .col-sm-12{

    }
  </style>
</head>


<body>

  <div class="row text-center">
  <div class="screen">

    	<img src="PAl.jpg" >
  		<h2 class="Title">PAL School</h2>
  		<!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a> -->
  		<div class="col-sm-12">

  			<nav class="navbar">
  			      <ul class="navbar_list">
  			        <li><a href="#" style="text-decoration: none">Startseite</a></li>
  			        <li><a href="#" style="text-decoration: none">Information</a></li>
  			        <li><a href="#" style="text-decoration: none">Unsere Schule</a></li>
  			        <li><a href="#" style="text-decoration: none">Förderverein</a></li>
  			      </ul>
  			</nav>
  		</div>

      <span class="dot">

      </span>
      <span class="dot"></span>
      <span class="dot"></span>
      <p class="dotone"> Signup</p>
      <p class="dottwo">Generate</p>
      <p class="dotthree">Login</p>
  		<footer class="container-fluid text-center">
  		  <p>Footer Text</p>
  		</footer>
      </div>
  </div>


</body>
</html>
