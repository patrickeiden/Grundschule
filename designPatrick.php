<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



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
    	color: white;
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

    .body{
      margin-top: 10px;
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

    .dot3 {
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

    .dot2 {
      height: 100px;
      width: 100px;
      background-color: #bbb;
      border-radius: 50%;
      position: relative;
      display: inline-block;
      top: 589px;
      background-color: orange;
      right: -123px;
      margin-right: 257px;
      margin-top: -50px;
    }

    .dotone{
      position: relative;
      top: 617px;
      color: black;
      font-size: 20px;
      width: 30%;
      margin-left: 145px;
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

    .fragezeichen{
        font-size: 70px;
        color: black;
    }

    .G{
      font-size: 70px;
      color: black;
    }

    .log-in{
        width: 50px;
        height: 50px;
        margin-left: 26px;
        margin-top: 23px;
    }

    #line_one{
      width: 400px;
      height: 2px;
      background-color: black;
      margin-top: 198px;
      border-bottom: 1px solid rgba(255, 255, 255, .5);;
      margin-left: 94px;
      }

      #line_two{
        width: 400px;
        height: 2px;
        background-color: black;
        border-bottom: 1px solid rgba(255, 255, 255, .5);;
        margin-left: 1010px;
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

    	<img src="PAl.jpg">
  		<h2 class="Title">PAL School</h2>
  		<!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a> -->
  		<div class="col-sm-12">

  			<nav class="navbar">
  			      <ul class="navbar_list">
  			        <li><a href="#" style="text-decoration: none">Startseite</a></li>
  			        <li><a href="#" style="text-decoration: none">Information</a></li>
  			        <li><a href="#" style="text-decoration: none">Login</a></li>
  			        <li><a href="#" style="text-decoration: none">Submit</a></li>
  			      </ul>
  			</nav>
  		</div>
      <div id="line_one"></div>
      <div id="line_two"></div>
    </div>

  <div id="body">
      <span class="dot">
        <p class="fragezeichen">?</p>
      </span>
      <span class="dot3">
        <p class="G">G</p>
      </span>
      <span class="dot2">
        <div class="log-in"><img src="login_image3.png" ></div>
      </span>
      <p class="dotone">Informations</p>
      <p class="dottwo">Generate</p>
      <p class="dotthree">Login</p>
      </div>
      <footer class="container-fluid text-center">
        <p>Footer Text</p>
      </footer>
    </div>
</body>
<script>

  document.getElementsByClassName('dot')[0].addEventListener("mouseenter", function() {
  isOnDiv=true;
  document.getElementsByClassName('dot')[0].style.height="150px";
  document.getElementsByClassName('dot')[0].style.width="150px";
  document.getElementsByClassName('dot')[0].style.top="580px";
  document.getElementsByClassName('dot3')[0].style.top="574px";
  document.getElementsByClassName('dot3')[0].style.right="-98px";
  document.getElementsByClassName('dot2')[0].style.top="558px";
  document.getElementsByClassName('dot2')[0].style.right="-98px";
  document.getElementsByClassName('fragezeichen')[0].style.position="relative";
  document.getElementsByClassName('fragezeichen')[0].style.top="10px";
  document.getElementsByClassName('fragezeichen')[0].style.fontSize="100px";
  document.getElementsByClassName('dottwo')[0].style.top="553px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="517px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="569px";
  });

  document.getElementsByClassName('dot')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot')[0].style.height="100px";
  document.getElementsByClassName('dot')[0].style.width="100px";
  document.getElementsByClassName('dot')[0].style.top="605px";
  document.getElementsByClassName('dot3')[0].style.top="605px";
  document.getElementsByClassName('dot3')[0].style.right="-123px";
  document.getElementsByClassName('dot2')[0].style.top="589px";
  document.getElementsByClassName('dot2')[0].style.right="-123px";
  document.getElementsByClassName('fragezeichen')[0].style.top="0px";
  document.getElementsByClassName('fragezeichen')[0].style.fontSize="70px";
  document.getElementsByClassName('dottwo')[0].style.top="584px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="548px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="600px";
  });

  document.getElementsByClassName('dot3')[0].addEventListener("mouseenter", function() {
  isOnDiv=true;
  document.getElementsByClassName('dot3')[0].style.height="150px";
  document.getElementsByClassName('dot3')[0].style.width="150px";
  document.getElementsByClassName('dot3')[0].style.top="580px";
  document.getElementsByClassName('dot')[0].style.top="574px";
  document.getElementsByClassName('dot')[0].style.right="-148px";
  document.getElementsByClassName('dot2')[0].style.top="558px";
  document.getElementsByClassName('dot2')[0].style.right="-98px";
  document.getElementsByClassName('G')[0].style.position="relative";
  document.getElementsByClassName('G')[0].style.top="10px";
  document.getElementsByClassName('G')[0].style.fontSize="100px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="586px";
  document.getElementsByClassName('dotthree')[0].style.top="517px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="569px";

  });

  document.getElementsByClassName('dot3')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot3')[0].style.height="100px";
  document.getElementsByClassName('dot3')[0].style.width="100px";
  document.getElementsByClassName('dot3')[0].style.top="605px";
  document.getElementsByClassName('dot')[0].style.top="605px";
  document.getElementsByClassName('dot')[0].style.right="-123px";
  document.getElementsByClassName('dot2')[0].style.top="589px";
  document.getElementsByClassName('dot2')[0].style.right="-123px";
  document.getElementsByClassName('G')[0].style.position="relative";
  document.getElementsByClassName('G')[0].style.top="0px";
  document.getElementsByClassName('G')[0].style.fontSize="70px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="617px";
  document.getElementsByClassName('dotthree')[0].style.top="548px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="600px";
  });

  document.getElementsByClassName('dot2')[0].addEventListener("mouseenter", function() {
  isOnDiv=true;
  document.getElementsByClassName('dot2')[0].style.height="150px";
  document.getElementsByClassName('dot2')[0].style.width="150px";
  document.getElementsByClassName('dot2')[0].style.top="580px";
  document.getElementsByClassName('dot')[0].style.top="574px";
  document.getElementsByClassName('dot')[0].style.right="-148px";
  document.getElementsByClassName('dot3')[0].style.top="558px";
  document.getElementsByClassName('dot3')[0].style.right="-98px";
  document.getElementsByClassName('log-in')[0].style.position="relative";
  document.getElementsByClassName('log-in')[0].style.top="10px";
  document.getElementsByClassName('log-in')[0].style.fontSize="100px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="586px";
  document.getElementsByClassName('dottwo')[0].style.top="517px";
  document.getElementsByClassName('dottwo')[0].style.left="944px";


  });

  document.getElementsByClassName('dot2')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot2')[0].style.height="100px";
  document.getElementsByClassName('dot2')[0].style.width="100px";
  document.getElementsByClassName('dot2')[0].style.top="605px";
  document.getElementsByClassName('dot')[0].style.top="605px";
  document.getElementsByClassName('dot')[0].style.right="-123px";
  document.getElementsByClassName('dot3')[0].style.top="589px";
  document.getElementsByClassName('dot3')[0].style.right="-123px";
  document.getElementsByClassName('log-in')[0].style.position="relative";
  document.getElementsByClassName('log-in')[0].style.top="0px";
  document.getElementsByClassName('log-in')[0].style.fontSize="70px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="617px";
  document.getElementsByClassName('dottwo')[0].style.top="548px";
  document.getElementsByClassName('dottwo')[0].style.left="944px";

  });

</script>
</html>
