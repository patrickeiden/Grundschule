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
      background-color: orange;
      padding: 10px;
      margin-bottom: 5px;
    }

    .Title {
    	color: orange;
      margin-left: 0px!important;
    }

    .glyphicon {
    	color: orange;
    }

    p, a, h1{
    	font-family: 'Poppins', sans-serif;
    }

    .container{
    	background-color: orange;
    }

    a {
    	color: white;
    	font-size: 20px;
    	text-transform: uppercase;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;

    }

    #news{
      height: 334px;
    }

    #news .n-title{
      background-color: aliceblue;
      height: 46px;
      position: relative;
      top: 0px;
      width: 89%;
      padding-top: 0px;
      left: 50px;
    }

    #news .container{
      background-color: white;
      height: 206px;
      padding-top: 0px;
      width: 89%;
      position: relative;
      top: 31px;
    }

    #news .text{
      width: 65%;
      height: 100%;
      background-color: aliceblue;
    }

    #news .image{
      height: 100%;
      width: 30%;
      position: relative;
      left: 72%;
      top: -216px;
      background-color: aliceblue;
    }

    img{
      height: 100%;
      width: 100%;
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
  </style>
</head>


<body>

<div class="row text-center">
  <div class="col-sm-2"></div>
		<div class="col-sm-8 text-left">
		<h1 class="Title">Grundschule PAL</h1>
		<!-- <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a> -->
		</div>
</div>

  <div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8">
		      <img src="Images/Ostseekinder_02.jpg" height="800" width="100%">
        </div>
  </div>
<div class="row">
		<div class="container-fluid text-center">
		  <div class="row content">
			    <div class="col-sm-2"></div>
				  <div class="col-sm-8 text-left">
			      <h1>Welcome</h1>
			      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			      <hr>
			      <h3>Test</h3>
			      <p>Lorem ipsum...</p>
            <div id="news">
              <p class="n-title"></p>
              <div class="container">
                <p class="text"></p>
                <div class="image">
                <img src="">
              </div>
              </div>
            </div>
				  </div>
        <div class="col-sm-2"></div>
		  </div>
		</div>
    <div class="col-sm-2"></div>
    <div class="col-sm-8 text-left">
  		<footer class="container-fluid text-center">
  		  <p>Footer Text</p>
  		</footer>
    </div>
</div>


</body>
</html>
