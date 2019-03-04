<?php include '../functions.php'; session_start();  ?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="css/admin-main.css">
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript">
      $(document).ready(function() {

      // page is now ready, initialize the calendar...

      $('#calendar').fullCalendar({
          weekends: true
      });

  });
  </script></header><body>
<h1>hallo</h1><?php echo printNavItemFunction($_SESSION["u_id"]);?><h1>das ist ein Test</h1><?php echo printCalendarAbove($_SESSION["u_id"]);?><div id="calendar"></div><?php echo printCalendarUnder($_SESSION["u_id"]);?>  		<footer class="container-fluid text-center">
  		  <p>Footer Text</p>
  		</footer>
    </div>
</div>


</body>
</html>