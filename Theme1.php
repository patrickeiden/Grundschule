<?php
  include "functions.php";
 ?>

<html>
<head>
  <title>Gruschool</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
  <script src='http://momentjs.com/downloads/moment.js'></script>
  <script src='fullcalendar/fullcalendar.js'></script>

  <script>
  	$(document).ready(function() {
  			$('#calendar').fullCalendar();
  		});
  	</script>

  <link rel="stylesheet" type="text/css" href="Css_Files/index.css">
  <link rel="stylesheet" type="text/css" href="Css_Files/page_main.css">
<title>Page Title</title>
<style>



.mySlides {display:none;}
.topnav {
background-color: #333;
overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
float: left;
display: block;
color: #f2f2f2;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
background-color: #ddd;
color: black;
}

/* Add an active class to highlight the current page */
.active {
background-color: #4CAF50;
color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
display: none;
}

#currentPage footer {
  background-color: #555;
  color: white;
  padding: 15px;

}

#currentPage h1, h3, p {
  text-align: center;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>
  <div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <h1>Schule "Name"</h1>
  <div class="w3-content w3-display-container">
    <img class="mySlides" src="Images/Ostseekinder_02.jpg" style="width:100%">

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
  </div>
  <h1>Welcome</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <hr>
  <h3>Test</h3>
  <p>Lorem ipsum...</p>

    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>

    <script>

    function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
    }

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
    </script>
</body>

</html>
