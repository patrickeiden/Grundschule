<?php include '../functions.php'; session_start(); ?><?php echo printRegularHeader($_SESSION["u_id"], ""); ?><?php $file = "userid".$_SESSION["u_id"]."/anfahrt_id".$_SESSION["u_id"].".php";echo allAnfahrtFiles($_SESSION["u_id"], $file); ?><?php echo printRegularFooter($_SESSION["u_id"]); ?>