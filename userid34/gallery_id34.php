<?php include '../functions.php'; session_start(); ?><?php echo printRegularHeader($_SESSION["u_id"], "gallery"); ?><div class="row">
				 <hr>
				 	<h1 class="text-center">Gallerien</h1>
				 <hr>
			 </div><?php $file = "userid".$_SESSION["u_id"]."/gallery_id".$_SESSION["u_id"].".php";allGalleries($_SESSION["u_id"], $file); ?><!-- jQuery -->
	<script src="../GallerieCSS/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../GallerieCSS/js/jquery.easing.1.3.js"></script>
	<script src="../GallerieCSS/js/bootstrap.min.js"></script>
	<script src="../GallerieCSS/js/jquery.waypoints.min.js"></script>
	<script src="../GallerieCSS/js/jquery.stellar.min.js"></script>
	<script src="../GallerieCSS/js/jquery.flexslider-min.js"></script>
	<script src="../GallerieCSS/js/main.js"></script><?php echo printRegularFooter($_SESSION["u_id"]); ?>