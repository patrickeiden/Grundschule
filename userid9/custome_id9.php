<?php include '../functions.php'; session_start();  ?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head><body>
<h1>hallo</h1><?php echo printNavItemFunction($_SESSION["u_id"]);?><h1>das ist ein Test</h1><?php echo printAllCustomeFromFile("userid9/custome_id9.php");?>  		<footer class="container-fluid text-center">
  		  <p>Footer Text</p>
  		</footer>
    </div>
</div>


</body>
</html>