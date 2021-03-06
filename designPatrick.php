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
      margin-top: 178px;
    }

    .dot {
      height: 100px;
      width: 100px;
      background-color: #bbb;
      border-radius: 50%;
      position: relative;
      display: inline-block;
      top: 205px;
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
      top: 205px;
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
      top: 158px;
      background-color: orange;
      right: -123px;
      margin-right: 257px;
      margin-top: -50px;
    }

    .dot4 {
      height: 100px;
      width: 100px;
      background-color: black;
      border-radius: 50%;
      position: relative;
      display: inline-block;
      top: 229px;
      background-color: orange;
      right: 238px;
      margin-right: -100px;
      opacity: 0.0;
    }

    .dotone{
      position: relative;
      top: 217px;
      color: black;
      font-size: 20px;
      width: 30%;
      margin-left: 145px;
      font-weight: bold;
      cursor: pointer;
    }

    .dottwo{
      position: relative;
      top: 184px;
      color: black;
      font-size: 20px;
      width: 20%;
      left: 583px;
      font-weight: bold;
      cursor: pointer;
    }

    .dotthree{
      position: relative;
      top: 148px;
      color: black;
      font-size: 20px;
      width: 20%;
      left: 944px;
      font-weight: bold;
      cursor: pointer;
    }

    .submit_span{

    }

    .signup_span{

    }

    .fragezeichen{
        font-size: 70px;
        color: black;
        font-weight: bold;
    }

    .G{
      font-size: 70px;
      color: black;
    }

    .log-in{
        height: 50px;
        position: relative;
        top: 24px;
        left: 2px;
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
      .login_image{

      }

      .text_one{
        color: black;
        width: 21%;
        position: relative;
        left: 15%;
        top: 319px;
        font-weight: bold;
      }

      .text_two{
        color: black;
        width: 21%;
        position: relative;
        left: 39%;
        top: 219px;
        font-weight: bold;
      }

      .text_three{
        color: black;
        width: 21%;
        position: relative;
        left: 64%;
        top: 219px;
        font-weight: bold;
      }

      #white{

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

    	<img src="Images/PAl.jpg">
  		<h2 class="Title">PAL School</h2>
  		<!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a> -->
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
      <div id="white"></div>
      <div id="line_one"></div>
      <div id="line_two"></div>
    </div>

  <div id="body">
      <p class="text_one">PAL is here to build Websites for elementary schools.
         You can easily make your own Site and we have a variation of modules you can integrate.<br><br>
        How it works: <br><br>
        You need to make an account, then you can make your own Website!
        </p>
      <p class="text_two">
        lalalasdniajkshdiaskdjaisdjiosajd
      </p>
      <p class="text_three">
        lalalasdniajkshdiaskdjaisdjiosajd
      </p>
      <span class="dot">
        <p class="fragezeichen">?</p>
      </span>
      <span class="dot3">
        <p class="G">G</p>
      </span>
      <span class="dot2">
        <div class="log-in"><img src="Images/login_image3.png" ></div>
      </span>
      <span class="dot4"></span>

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
  document.getElementsByClassName('dot')[0].style.top="180px";
  document.getElementsByClassName('dot3')[0].style.top="205px";
  document.getElementsByClassName('dot3')[0].style.right="-98px";
  document.getElementsByClassName('dot2')[0].style.top="158px";
  document.getElementsByClassName('dot4')[0].style.right="263px";
  document.getElementsByClassName('dot2')[0].style.right="-98px";
  document.getElementsByClassName('fragezeichen')[0].style.position="relative";
  document.getElementsByClassName('fragezeichen')[0].style.top="10px";
  document.getElementsByClassName('fragezeichen')[0].style.fontSize="100px";
  document.getElementsByClassName('dottwo')[0].style.top="184px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="148px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="178px";
  });

  document.getElementsByClassName('dot')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot')[0].style.height="100px";
  document.getElementsByClassName('dot')[0].style.width="100px";
  document.getElementsByClassName('dot')[0].style.top="205px";
  document.getElementsByClassName('dot3')[0].style.top="205px";
  document.getElementsByClassName('dot3')[0].style.right="-123px";
  document.getElementsByClassName('dot2')[0].style.top="158px";
  document.getElementsByClassName('dot2')[0].style.right="-123px";
  document.getElementsByClassName('dot4')[0].style.right="238px";
  document.getElementsByClassName('fragezeichen')[0].style.top="0px";
  document.getElementsByClassName('fragezeichen')[0].style.fontSize="70px";
  document.getElementsByClassName('dottwo')[0].style.top="184px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="148px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="178px";
  });

  document.getElementsByClassName('dot3')[0].addEventListener("mouseenter", function() {
  isOnDiv=true;
  document.getElementsByClassName('dot3')[0].style.height="150px";
  document.getElementsByClassName('dot3')[0].style.width="150px";
  document.getElementsByClassName('dot3')[0].style.top="180px";
  document.getElementsByClassName('dot')[0].style.top="205px";
  document.getElementsByClassName('dot')[0].style.right="-148px";
  document.getElementsByClassName('dot2')[0].style.top="158px";
  document.getElementsByClassName('dot2')[0].style.right="-98px";
  document.getElementsByClassName('dot4')[0].style.right="263px";
  document.getElementsByClassName('G')[0].style.position="relative";
  document.getElementsByClassName('G')[0].style.top="10px";
  document.getElementsByClassName('G')[0].style.fontSize="100px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="217px";
  document.getElementsByClassName('dotthree')[0].style.top="148px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('dottwo')[0].style.top="184px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="178px";

  });

  document.getElementsByClassName('dot3')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot3')[0].style.height="100px";
  document.getElementsByClassName('dot3')[0].style.width="100px";
  document.getElementsByClassName('dot3')[0].style.top="205px";
  document.getElementsByClassName('dot')[0].style.top="205px";
  document.getElementsByClassName('dot')[0].style.right="-123px";
  document.getElementsByClassName('dot2')[0].style.top="158px";
  document.getElementsByClassName('dot2')[0].style.right="-123px";
  document.getElementsByClassName('dot4')[0].style.right="238px";
  document.getElementsByClassName('G')[0].style.position="relative";
  document.getElementsByClassName('G')[0].style.top="0px";
  document.getElementsByClassName('G')[0].style.fontSize="70px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="217px";
  document.getElementsByClassName('dottwo')[0].style.top="184px";
  document.getElementsByClassName('dotthree')[0].style.top="148px";
  document.getElementsByClassName('dotthree')[0].style.left="944px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="178px";
  });

  document.getElementsByClassName('dot4')[0].addEventListener("mouseenter", function() {
  isOnDiv=true;
  document.getElementsByClassName('dot2')[0].style.height="150px";
  document.getElementsByClassName('dot2')[0].style.width="150px";
  document.getElementsByClassName('dot2')[0].style.top="65px";
  document.getElementsByClassName('dot2')[0].style.right="-150px";
  document.getElementsByClassName('dot4')[0].style.height="150px";
  document.getElementsByClassName('dot4')[0].style.width="150px";
  document.getElementsByClassName('dot4')[0].style.top="178px";
  document.getElementsByClassName('dot4')[0].style.right="261px";
  document.getElementsByClassName('log-in')[0].style.top="50px";
  document.getElementsByClassName('log-in')[0].style.height="64px";

  document.getElementsByClassName('dot')[0].style.top="155px";
  document.getElementsByClassName('dot')[0].style.right="-173px";
  document.getElementsByClassName('dot3')[0].style.top="155px";
  document.getElementsByClassName('dot3')[0].style.right="-173px";

  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="124px";
  document.getElementsByClassName('dottwo')[0].style.top="91px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="55px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="85px";
  });

  document.getElementsByClassName('dot4')[0].addEventListener("mouseout", function() {
  isOnDiv=false;
  document.getElementsByClassName('dot2')[0].style.height="100px";
  document.getElementsByClassName('dot2')[0].style.width="100px";
  document.getElementsByClassName('dot2')[0].style.top="158px";
  document.getElementsByClassName('dot2')[0].style.right="-123px";
  document.getElementsByClassName('dot4')[0].style.height="100px";
  document.getElementsByClassName('dot4')[0].style.width="100px";
  document.getElementsByClassName('dot4')[0].style.top="229px";
  document.getElementsByClassName('dot4')[0].style.right="238px";
  document.getElementsByClassName('log-in')[0].style.top="24px";
  document.getElementsByClassName('log-in')[0].style.height="50px";


  document.getElementsByClassName('dot')[0].style.top="205px";
  document.getElementsByClassName('dot')[0].style.right="-123px";
  document.getElementsByClassName('dot3')[0].style.top="205px";
  document.getElementsByClassName('dot3')[0].style.right="-123px";
  document.getElementsByClassName('dotone')[0].style.marginLeft="145px";
  document.getElementsByClassName('dotone')[0].style.top="217px";
  document.getElementsByClassName('dottwo')[0].style.top="184px";
  document.getElementsByClassName('dottwo')[0].style.left="583px";
  document.getElementsByClassName('dotthree')[0].style.top="148px";
  document.getElementsByClassName('container-fluid')[0].style.marginTop="178px";
  });
  $(document).ready(function () {

      $(".text_one").hide();;
      $(".text_two").hide();;
      $(".text_three").hide();;

      $(".dotone").click(function () {

          if($(".text_one").css('display') == 'none'){
            $(".dot").animate({top:"-40px"},500);
            $(".text_one").show();

          }else{
            $(".text_one").hide();;
            $(".dot").animate({top:"205px"},500);
          }

      });

      $(".dottwo").click(function () {

          if($(".text_two").css('display') == 'none'){
            $(".dot3").animate({top:"0px"},500);
            $(".text_two").show();

          }else{
            $(".text_two").hide();;
            $(".dot3").animate({top:"205px"},500);
          }

      });

      $(".dotthree").click(function () {

          if($(".text_three").css('display') == 'none'){
            $(".dot2").animate({top:"-40px"},500);
            $(".dot4").animate({top:"-40px"},500);
            $(".text_three").show();

          }else{
            $(".text_three").hide();;
            $(".dot2").animate({top:"205px"},500);
            $(".dot4").animate({top:"205px"},500);
          }

      });
  });
</script>
</html>
